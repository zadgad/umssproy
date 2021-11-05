<?php

namespace App\Http\Controllers;
use App\Rol;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class eduardas extends Controller
{
            public function formulpro(){
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){
                        return view('eduards.formpro');
                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');

            }
            public function formulaunid(){
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){
                        return view('eduards.formulmediada');
                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');
            }
            public function formulaunidpro(){
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){
                        return view('eduards.formuactpro');
                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');


            }

            public function formulacti($id){
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){
                        $pro=$id;
                        $select=DB::table('proyecto')->join('construccion','id_proye','proyecto_id')->distinct('nombr_c')->get();
                        $contr=DB::table('construccion')->where('proyecto_id','=',$pro)->select('nombr_c')->get();
                        $unid=DB::table('unidamed')->select('nombr_m')->get();
                        $unid_pro=DB::table('unid_pro')->select('nombre')->get();
                        // $select=DB::table('proyecto')->join('construccion','proyecto_id','id_proye')->('material','cont_id','id_cont')->join('maquinaria','cont_id','id_cont')->join('manob','cont_id','id_cont')->select('')->get();
                        $aux='0.00';
                        $aux1='0';
                        $aux2='select';
                        return view('eduards.formulacti',compact('contr','unid_pro','aux','aux1','aux2','unid','pro'));
                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');

            }
            public function insertpro(Request $request){
                    $this->validate($request,[

                        'proyect'=>'required|string|max:255',
                        'clasifi'=>'required|string|max:255',
                        'provin' =>'required|string|max:255'

                    ]);
                    $idus=session()->get('user_rol')->first();
                    $date = Carbon::now();
                    $proye=$request->input('proyect');
                    $clasi=$request->input('clasifi');
                    $provi=$request->input('provin');
                        $insert=DB::table('proyecto')->insert(['nombr_proy'=>$proye,'tipo'=>$clasi,'provincia'=>$provi,'user_idp'=>$idus,'fechap'=>$date]);
                      return  redirect()->route('tabpro')->with('info');
            }
            public function inserunid(Request $request){
                $this->validate($request,
                [
                    'unidad' =>'required|string|max:255',
                    'abre'=>'required|string|max:255'

                ]);

                $uni=$request->input('unidad');
                $abre=$request->input('abre');
                    $insert=DB::table('unidamed')->insert(['nombr_m'=>$uni,'abre'=>$abre]);
                    return redirect()->route('tabpro')
                    ->with('info');
            }
            public function instunidact(Request $request){
                $this->validate($request,
                [
                    'unidad' =>'required|string|max:255',
                    'abre'=>'required|string|max:255'

                ]);
                $uni=$request->input('unidad');
                $abre=$request->input('abre');
                    $insert=DB::table('unid_pro')->insert(['nombre'=>$uni,'abre'=>$abre]);
                    return redirect()->route('tabpro')
                    ->with('info');
            }
            public function insertact(Request $request){
                $this->validate(
                    $request,
                        [
                            'proy'=>'required|integer',
                            'sen' =>'required|string|max:255',
                            'nombr'=>'required|string|max:255',
                            'unid_pro'=>'required|string|max:255',
                            'clasi'=>'required|string|max:255',
                            'info'=>'required|numeric',
                            'info1'=>'required|numeric',
                            'cost'=>'required|numeric',
                            'info2' => 'required|numeric',
                            'unid'=>'required|string|max:255'

                        ] );
                    $pro=$request->input('proy');
                    $sen=$request->input('sen');
                    $nom=$request->input('nombr');
                    $unidp=$request->input('unid_pro');
                    $cla=$request->input('clasi');
                    $inf=$request->input('info');
                    $fo1=$request->input('info1');
                    $cost=$request->input('cost');
                    $fo2=$request->input('info2');
                    $uni=$request->input('unid');
                    $idus=session()->get('user_rol')->first();
                    $date = Carbon::now();
                    $id_up=DB::table('unid_pro')->where('nombre','=',$unidp)->pluck('id_md')->first();
                           $count=DB::table('construccion')->where('nombr_c','=',$sen)->where('proyecto_id','=',$pro)->count();
                           if($count>0){
                        $idconts=DB::table('construccion')->where('nombr_c','=',$sen)->first('id_cont');
                        if($cla=='Material'){

                            $may=DB::table('material')->max('id_mate');
                            $max=$may+1;
                            $cod='Mat'.$max;
                            $unid=DB::table('unidamed')->where('nombr_m','=',$uni)->first('id_med');
                            $insertar=DB::table('material')->insert(['nomb_mat'=>$nom,'cont_id'=>$idconts->id_cont,'unid_med'=>$unid->id_med,'cantid_ma'=>$fo2,'cost_unidad'=>$cost,'codigo_mat'=>$cod,'user_idmt'=>$idus,'fechamt'=>$date]);
                        }
                        if($cla=='Maquina'){
                            $may=DB::table('maquinaria')->max('id_maq');
                            $max=$may+1;
                            $cod='Maq'.$max;
                            $insert=DB::table('maquinaria')->insert(['nomb_maq'=>$nom,'cost_h'=>$inf,'hor_t'=>$fo1,'cont_id'=>$idconts->id_cont,'codigo_mt'=>$cod,'user_idmq'=>$idus,'fechamq'=>$date]);
                        }
                        if($cla=='ManoB'){
                            $may=DB::table('manob')->max('id_mano');
                            $max=$may+1;
                            $cod='Mano'.$max;
                            $insert=DB::table('manob')->insert(['nomb_ca'=>$nom,'c_hor'=>$inf,'total_h'=>$fo1,'cont_id'=>$idconts->id_cont,'codigo'=>$cod,'user_idmb'=>$idus,'fechamb'=>$date]);
                        }
                            }else{
                                $in=DB::table('construccion')->insert(['nombr_c'=>$sen,'proyecto_id'=>$pro,'und_id'=>$id_up,'user_idc'=>$idus,'fecha'=>$date]);
                                $idconts=DB::table('construccion')->where('nombr_c','=',$sen)->first('id_cont');
                                if($cla=='Material'){
                                    $may=DB::table('material')->max('id_mate');
                                    $max=$may+1;
                                    $cod='Mat'.$max;
                                    $unid=DB::table('unidamed')->where('nombr_m','=',$uni)->first('id_med');
                                    $insertar=DB::table('material')->insert(['nomb_mat'=>$nom,'cont_id'=>$idconts->id_cont,'und_id'=>$unid->id_med,'cantid_ma'=>$fo2,'cost_unidad'=>$cost,'codigo_mat'=>$cod,'user_idmt'=>$idus,'fechamt'=>$date]);
                                }
                                if($cla=='Maquina'){
                                    $may=DB::table('maquinaria')->max('id_maq');
                                    $max=$may+1;
                                    $cod='Maq'.$max;
                                    $insert=DB::table('maquinaria')->insert(['nomb_maq'=>$nom,'cost_h'=>$inf,'hor_t'=>$fo1,'cont_id'=>$idconts->id_cont,'codigo_mt'=>$cod,'user_idmq'=>$idus,'fechamq'=>$date]);
                                }
                                if($cla=='ManoB'){
                                    $may=DB::table('manob')->max('id_mano');
                                    $max=$may+1;
                                    $cod='Mano'.$max;
                                    $insert=DB::table('manob')->insert(['nomb_ca'=>$nom,'c_hor'=>$inf,'total_h'=>$fo1,'cont_id'=>$idconts->id_cont,'codigo'=>$cod,'user_idmb'=>$idus,'fechamb'=>$date]);
                                }
                            }
                            return  redirect()->action('eduardas@tablact', $pro);

            }
            public function editpro($id){
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){
                            $aux=$id;
                            $val=DB::table('proyecto')->where('id_proye','=',$aux)->select('id_proye','nombr_proy','tipo','provincia')->get();
                            return view('eduards.editproyec',compact('val'));
                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');
            }
            public function eproyect(Request $request){

                $this->validate($request,[
                    'proy'=>'required|integer',
                    'proyect'=>'required|string|max:255',
                    'clasifi'=>'required|string|max:255',
                    'provin' =>'required|string|max:255'

                ]);
                $idus=session()->get('user_rol')->first();
                $date = Carbon::now();
                $proy=$request->input('proy');
                $proye=$request->input('proyect');
                $clasi=$request->input('clasifi');
                $provi=$request->input('provin');
                $insert=DB::table('proyecto')->where('id_proye','=',$proy)->update(['nombr_proy'=>$proye,'tipo'=>$clasi,'provincia'=>$provi]);
                return redirect()->route('tabpro')
                    ->with('info');
            }
            public function editact($id){

                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){
                            $aux=$id;

                        $item=DB::table('maquinaria')->where('codigo_mt','=',$aux)->count();
                        $item1=DB::table('material')->where('codigo_mat','=',$aux)->count();
                        $item2=DB::table('manob')->where('codigo','=',$aux)->count();

                        if($item==1){
                            $aux1=DB::table('construccion')->join('maquinaria','cont_id','id_cont')->where('codigo_mt','=',$aux)->select('proyecto_id')->get();
                            $salbar=DB::table('construccion')->join('proyecto','id_proye','proyecto_id')->join('material','cont_id','id_cont')->join('usr','user_idmt','id_usr')->join('persona','ci','ci_per')->where('codigo_mat','=',$aux)->select('nombr_proy','nombr_c','nomb_maq','ci','nombre','cost_h','hor_t','cont_id')->get();
                            $selec=DB::table('maquinaria')->where('codigo_mt','=',$aux)->select('nomb_maq','cost_h','hor_t','cont_id')->get();
                        }
                        if($item1==1){
                            $aux1=DB::table('construccion')->join('material','cont_id','id_cont')->where('codigo_mat','=',$aux)->select('proyecto_id')->get();
                            $salbar=DB::table('construccion')->join('proyecto','id_proye','proyecto_id')->join('material','cont_id','id_cont')->join('usr','user_idmt','id_usr')->join('persona','ci','ci_per')->where('codigo_mat','=',$aux)->select('nombr_proy','nombr_c','nomb_mat','ci','nombre')->get();
                            $selec=DB::table('material')->where('codigo_mat','=',$aux)->select('nomb_mat','cantid_ma','cost_unidad','cont_id','unid_med')->get();

                        }
                        if($item2==1){
                            $aux1=DB::table('construccion')->join('manob','cont_id','id_cont')->where('codigo','=',$aux)->select('proyecto_id')->get();
                            $salbar=DB::table('construccion')->join('proyecto','id_proye','proyecto_id')->join('material','cont_id','id_cont')->join('usr','user_idmt','id_usr')->join('persona','ci','ci_per')->where('codigo_mat','=',$aux)->select('nombr_proy','nombr_c','nomb_ca','ci','nombre')->get();
                            $selec=DB::table('manob')->where('codigo_mat','=',$aux)->select('nomb_ca','c_hor','total_h','cont_id')->get();

                        }

                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');
            }
            public function editunid(){
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){

                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');

            }
            public function tablapro(){

                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){
                        $proy=DB::table('proyecto')->select('id_proye','nombr_proy','tipo','provincia')->get();
                        return view('eduards.tablaspro',compact('proy'));
                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');
            }
            public function tablact($id){
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){
                        $aux=$id;

                        $nombrp=DB::table('proyecto')->where('id_proye','=',$aux)->pluck('nombr_proy');
                       $select=DB::table('construccion')->join('proyecto','id_proye','proyecto_id')->join('unid_pro','id_md','und_id')->where('proyecto_id','=',$aux)->select('proyecto.nombr_proy','construccion.id_cont','construccion.nombr_c','unid_pro.nombre')->get();
                        return view('eduards.tablact',compact('select','nombrp'));
                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');
            }
            public function editactiv($id){
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){
                        $aux=$id;

                        $selec=DB::table('construccion')->join('proyecto','id_proye','proyecto_id')->join('unid_pro','id_md','und_id')->where('id_cont','=',$aux)->select('id_cont','nombr_c','proyecto_id','und_id','nombr_proy','nombre')->get();
                        $proy=DB::table('proyecto')->select('id_proye','nombr_proy')->get();
                        $item=DB::table('unid_pro')->select('id_md','nombre')->get();
                        return view('eduards.editem',compact('selec','proy','item'));
                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');
            }
            public function insertarItem(Request $request){
                $this->validate($request,[
                    'const'=>'required|integer',
                    'proy'=>'required|string|max:255',
                    'nombr'=>'required|string|max:255',
                    'unid_pro' =>'required|string|max:255'

                ]);

                $proy=intval($request->input('const'));
                $proye=$request->input('proy');
                $clasi=$request->input('nombr');
                $provi=$request->input('unid_pro');
                $id_unid=DB::table('unid_pro')->where('nombre','=',$provi)->pluck('id_md');
                $insert=DB::table('construccion')->where('id_cont','=',$proy)->update(['nombr_c'=>$proye,'und_id'=>$id_unid[0]]);
                return redirect()->route('tabact',$proy);


            }
            public function tabitem(){
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){

                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');
            }
            public function tabmate(){
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){

                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');
            }

            public function borrapro($id){
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){
                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');
            }
            public function borraracti($id){
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){
                        $aux=$id;
                        $id_us=session()->get('id');
                        $item=DB::table('maquinaria')->where('codigo_mt','=',$aux)->count();
                        $item1=DB::table('material')->where('codigo_mat','=',$aux)->count();
                        $item2=DB::table('manob')->where('codigo','=',$aux)->count();
                        $date = Carbon::now();
                        if($item==1){
                            $aux1=DB::table('construccion')->join('maquinaria','cont_id','id_cont')->where('codigo_mt','=',$aux)->select('proyecto_id')->get();
                            $salbar=DB::table('construccion')->join('proyecto','id_proye','proyecto_id')->join('material','cont_id','id_cont')->join('usr','user_idmt','id_usr')->join('persona','ci','ci_per')->where('codigo_mat','=',$aux)->select('nombr_proy','nombr_c','nomb_maq','ci','nombre')->get();
                            $inserts=DB::table('deliminar')->insert(['pory'=>$salbar[0]->nombr_proy,'constr'=>$salbar[0]->nombr_c,'nombre_act'=>$salbar[0]->nomb_maq,'ciper'=>$salbar[0]->ci,'nomb_us'=>$salbar[0]->nombre,'user_ids'=>$id_us[0],'fech'=>$date]);
                            $del=$this->borrart($aux1[0]->proyecto_id,$id_us[0]);
                            $dele=DB::table('maquinaria')->where('codigo_mt','=',$aux)->delete();
                            return redirect()->route('tabpro')
                            ->with('info');
                        }
                        if($item1==1){

                            $aux1=DB::table('construccion')->join('material','cont_id','id_cont')->where('codigo_mat','=',$aux)->select('proyecto_id')->get();
                            $salbar=DB::table('construccion')->join('proyecto','id_proye','proyecto_id')->join('material','cont_id','id_cont')->join('usr','user_idmt','id_usr')->join('persona','ci','ci_per')->where('codigo_mat','=',$aux)->select('nombr_proy','nombr_c','nomb_mat','ci','nombre')->get();
                            $inserts=DB::table('deliminar')->insert(['pory'=>$salbar[0]->nombr_proy,'constr'=>$salbar[0]->nombr_c,'nombre_act'=>$salbar[0]->nomb_mat,'ciper'=>$salbar[0]->ci,'nomb_us'=>$salbar[0]->nombre,'user_ids'=>$id_us[0],'fech'=>$date]);
                            $del=$this->borrart($aux1[0]->proyecto_id,$id_us[0]);

                            $dele=DB::table('material')->where('codigo_mat','=',$aux)->delete();
                            return redirect()->route('tabpro')
                            ->with('info');
                        }
                        if($item2==1){
                            $aux1=DB::table('construccion')->join('manob','cont_id','id_cont')->where('codigo','=',$aux)->select('proyecto_id')->get();
                            $salbar=DB::table('construccion')->join('proyecto','id_proye','proyecto_id')->join('material','cont_id','id_cont')->join('usr','user_idmt','id_usr')->join('persona','ci','ci_per')->where('codigo_mat','=',$aux)->select('nombr_proy','nombr_c','nomb_ca','ci','nombre')->get();
                            $inserts=DB::table('deliminar')->insert(['pory'=>$salbar[0]->nombr_proy,'constr'=>$salbar[0]->nombr_c,'nombre_act'=>$salbar[0]->nomb_ca,'ciper'=>$salbar[0]->ci,'nomb_us'=>$salbar[0]->nombre,'user_ids'=>$id_us[0],'fech'=>$date]);

                            $del=$this->borrart($aux1[0]->proyecto_id,$id_us[0]);

                            $dele=DB::table('manob')->where('codigo','=',$aux)->delete();
                            return redirect()->route('tabpro')
                            ->with('info');
                        }



                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');
            }

            public function borrarunid(){

            }
            public function tablasres(){

            }
            public function forcalculo($id){
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){
                        $auxiliar=$id;
                        $sel=session()->get('user_rol')->first();
                        $count=DB::table('datos')->where('item_us','=',$sel)->where('item_act','=',$auxiliar)->count();
                        if($count==0){
                            return view('eduards.formvariables',compact('auxiliar'));

                        }   else{
                            $count=DB::table('datos')->where('item_us','=',$sel)->where('item_act','=',$auxiliar)->select('item1','item2','item3','item4','item5','item6','item_us','item_act',)->get();

                            return view('eduards.formvariables1',compact('auxiliar','count'));

                        }

                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');
            }
            public function tablasM($id){
                $aux=$id;

                $selec=DB::table('manob')->where('construccion.id_cont','=',$aux)->join('construccion','id_cont','cont_id')->select('id_mano','nomb_ca','c_hor','total_h','construccion.nombr_c','codigo')->get();
                //dd($selec);
                return view('eduards.tablamo',compact('selec'));
            }
            public function tablasMat($id){
                $aux=$id;
                $datos=DB::table('material')->join('construccion','id_cont','cont_id')->join('unidamed','id_med','unid_med')->where('construccion.id_cont','=',$aux)->select('id_mate','nomb_mat','unidamed.nombr_m','cost_unidad','cantid_ma','construccion.nombr_c','codigo_mat')->get();
                return view('eduards.tablasM',compact('datos'));
            }
            public function tablamo($id){
                $aux=$id;
                $datos=DB::table('maquinaria')->join('construccion','id_cont','cont_id')->where('construccion.id_cont','=',$aux)->select('id_maq','nomb_maq','cost_h','hor_t','construccion.nombr_c','codigo_mt')->get();
                return view('eduards.tablasMat',compact('datos'));
            }
            public function calcular($id){
                 $aux=$id;
                // $selecMat=DB::table('proyecto')->join('material')->where()->select()->get();
                // $selecMan=DB::table('proyecto')->join('manob')->where()->select()->get();
                // $selecMaq=DB::table('proyecto')->join('maquinaria')->where()->select()->get();
            }
            public function sumatoria(Request $request){
                $this->validate(
                    $request,
                        [
                            'idproy'=>'required|integer',
                            'carga' =>'required|numeric',
                            'iva'=>'required|numeric',
                            'herramientas'=>'required|numeric',
                            'generales' =>'required|numeric',
                            'utilidad' =>'required|numeric',
                            'impuestos'=>'required|numeric'
                        ] );
                        $user=session()->get('user_rol')->first();
                        $pro=$request->input('idproy');
                        $carga=$request->input('carga');
                        $iv=$request->input('iva');
                        $herra=$request->input('herramientas');
                        $generales=$request->input('generales');
                        $utilid=$request->input('utilidad');
                        $impue=$request->input('impuestos');
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){
                        $aux=$pro;
                        $date = Carbon::now();
                        $datf = $date->format('Y-m-d');
                        $id_us=session()->get('id')->first();
                        $tipo=DB::table('proyecto')->join('construccion','proyecto_id','id_proye')->where('id_cont','=',$aux)->pluck('tipo')->first();
                        $ident=DB::table('proyecto')->join('construccion','proyecto_id','id_proye')->where('id_cont','=',$aux)->select('construccion.nombr_c','nombr_proy')->get();
                        $auxil=DB::table('proyecto')->join('construccion','proyecto_id','id_proye')->where('id_cont','=',$aux)->pluck('id_proye')->first();
                        $informacion=DB::table('proyecto')->join('construccion','proyecto_id','id_proye')->join('unid_pro','id_md','und_id')->where('id_cont','=',$aux)->select('nombr_proy','tipo','provincia','nombre','nombr_c')->get();
                        $count=DB::table('datos')->where('item_us','=',$user)->where('item_act','=',$pro)->count();
                        $codigo="INS0".$id_us;
                        $this->borrart($auxil,$id_us);
                        $carga_soc=$carga;
                        $iva=$iv/100;
                        $ince=$herra/100;
                        $por_suma=$generales/100;
                        $util=$utilid/100;
                        $impues=$impue/100;
                        if($count==1){
                                $update=DB::table('datos')->where('item_us','=',$user)->where('item_act','=',$pro)->update(['item1'=>$carga,'item2'=>$iv,'item3'=>$herra,'item4'=>$generales,'item5'=>$utilid,'item6'=>$impue,'item_us'=>$user,'item_act'=>$pro]);
                        }else{
                            $insetertion=DB::table('datos')->insert(['item1'=>$carga,'item2'=>$iv,'item3'=>$herra,'item4'=>$generales,'item5'=>$utilid,'item6'=>$impue,'item_us'=>$user,'item_act'=>$pro]);

                        }
                        if($tipo=="Rural"){
                            $cost=0.1;
                            $totalMat=$this->cotimat($auxil,$cost);
                            $sumaMt=DB::table('tabla_mat')->where('proy_id','=',$auxil)->where('user_id','=',$id_us)->sum('cost_total');
                            $totalMaq=$this->cotimaq($auxil);
                            $sumaMq=DB::table('tabla_maqui')->where('proy_id','=',$auxil)->where('user_id','=',$id_us)->sum('total_cos');
                            $totalMab=$this->cotimab($auxil);
                            $sumaMb=DB::table('tabla_manob')->where('proy_id','=',$auxil)->where('user_id','=',$id_us)->sum('cost');
                            $cS=$sumaMb*$carga_soc;
                            $cs=round($cS, 2);
                            $ivas=$sumaMb+$cs;
                            $tivas=round($ivas*$iva, 2);
                            $total_mano=$sumaMb+$cs+$tivas;
                            $herra_mano=round($total_mano*$ince, 2);
                            $total_maq=$herra_mano+$sumaMq;
                            $suma_t=$sumaMt+$total_mano+$total_maq;
                            $suma_total=round(($sumaMt+$total_mano+$total_maq)*$por_suma,2);
                            $utilidades=$sumaMt+$total_mano+$total_maq+$suma_total;
                            $utilidad=round(($sumaMt+$total_mano+$total_maq+$suma_total)*$util,2);
                            $impuest=$sumaMt+$total_mano+$total_maq+$suma_total+$utilidad;
                            $impuestos=round(($sumaMt+$total_mano+$total_maq+$suma_total+$utilidad)*$impues,2);
                            $total_precio=($sumaMt+$total_mano+$total_maq+$suma_total+$utilidad+$impuestos);

                            return view( 'eduards.tablares',compact('totalMat','sumaMt','totalMab','sumaMb','totalMaq','sumaMq','cs','ivas','tivas','total_mano','herra_mano','total_maq','suma_t','suma_total','utilidades','utilidad','impuest','impuestos','total_precio','ident','codigo','informacion','datf','auxil','carga','iv','herra','generales','utilid','impue'));
                        }
                        if($tipo=="Urbano"){
                            $cost=0.05;
                            $totalMat=$this->cotimat($auxil,$cost);
                            $sumaMt=DB::table('tabla_mat')->where('proy_id','=',$auxil)->where('user_id','=',$id_us)->sum('cost_total');
                            $totalMaq=$this->cotimaq($auxil);
                            $sumaMq=DB::table('tabla_maqui')->where('proy_id','=',$auxil)->where('user_id','=',$id_us)->sum('total_cos');
                            $totalMab=$this->cotimab($auxil);
                            $sumaMb=DB::table('tabla_manob')->where('proy_id','=',$auxil)->where('user_id','=',$id_us)->sum('cost');
                            $cS=$sumaMb*$carga_soc;
                            $cs=round($cS, 2);
                            $ivas=$sumaMb+$cs;
                            $tivas=round($ivas*$iva, 2);
                            $total_mano=$sumaMb+$cs+$tivas;
                            $herra_mano=round($total_mano*$ince, 2);
                            $total_maq=$herra_mano+$sumaMq;
                            $suma_t=$sumaMt+$total_mano+$total_maq;
                            $suma_total=round(($sumaMt+$total_mano+$total_maq)*$por_suma,2);
                            $utilidades=$sumaMt+$total_mano+$total_maq+$suma_total;
                            $utilidad=round(($sumaMt+$total_mano+$total_maq+$suma_total)*$util,2);
                            $impuest=$sumaMt+$total_mano+$total_maq+$suma_total+$utilidad;
                            $impuestos=round(($sumaMt+$total_mano+$total_maq+$suma_total+$utilidad)*$impues,2);
                            $total_precio=($sumaMt+$total_mano+$total_maq+$suma_total+$utilidad+$impuestos);

                            return view( 'eduards.tablares',compact('totalMat','sumaMt','totalMab','sumaMb','totalMaq','sumaMq','cs','ivas','tivas','total_mano','herra_mano','total_maq','suma_t','suma_total','utilidades','utilidad','impuest','impuestos','total_precio','ident','codigo','informacion','datf','auxil','carga','iv','herra','generales','utilid','impue'));
                        }

                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');

                // $selecMat=DB::table('proyecto')->join('material')->where()->select()->get();
                // $selecMan=DB::table('proyecto')->join('manob')->where()->select()->get();
                // $selecMaq=DB::table('proyecto')->join('maquinaria')->where()->select()->get();
            }
            private function borrart($aux,$id_us){

                $countmn=DB::table('tabla_manob')->where('proy_id','=',$aux)->where('user_id','=',$id_us)->delete();
                $countmq=DB::table('tabla_maqui')->where('proy_id','=',$aux)->where('user_id','=',$id_us)->delete();
                $countmt=DB::table('tabla_mat')->where('proy_id','=',$aux)->where('user_id','=',$id_us)->delete();
            }
            private function cotimat($aux,$cost){
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){
                        $val=$cost;
                        $selecMat=DB::table('proyecto')->join('construccion','proyecto_id','id_proye')->join('material','cont_id','id_cont')->join('unidamed','id_med','unid_med')->where('id_proye','=',$aux)->select('id_mate','nomb_mat','cantid_ma','cost_unidad','cont_id','unid_med','codigo_mat','abre')->get();
                        $item1=DB::table('proyecto')->join('construccion','proyecto_id','id_proye')->join('material','cont_id','id_cont')->where('id_proye','=',$aux)->count();
                        $user=session()->get('id');
                        if($item1>=0){
                            for($x=0;count($selecMat)>$x;$x++){
                                $unid=$selecMat[$x]->abre;
                                $nomb=$selecMat[$x]->nomb_mat;
                                $cod=$selecMat[$x]->codigo_mat;
                                $cost=$selecMat[$x]->cost_unidad+(($selecMat[$x]->cost_unidad)*$val);
                                $cant=$selecMat[$x]->cantid_ma;
                                $total=$cost*$cant;
                                $insert=DB::table('tabla_mat')->insert(['numtab'=>$cod,'descripmat'=>$nomb,'unidmt'=>$unid,'cantidad'=>$cant,'costxunid'=>$cost,'cost_total'=>$total,'proy_id'=>$aux,'user_id'=>$user[0]]);
                            }
                    $selMat=DB::table('tabla_mat')->where('user_id','=',$user[0])->where('proy_id','=',$aux)->select('numtab','descripmat','cantidad','costxunid','cost_total','unidmt')->get();
                            return $selMat;

                        }else{
                            $insert=DB::table('tabla_mat')->insert(['numtab'=>'-','descripmat'=>'-','unidmt'=>'-','cantidad'=>'0','costxunid'=>'0','cost_total'=>'0','proy_id'=>$aux,'user_id'=>$user[0]]);
                            $selMat=DB::table('tabla_mat')->where('user_id','=',$user[0])->where('proy_id','=',$aux)->select('numtab','descripmat','cantidad','costxunid','cost_total','unidmt')->get();
                            return $selMat;

                        }
                            }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');
            }
            private function cotimaq($aux){
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){

                        $selecMaq=DB::table('proyecto')->join('construccion','proyecto_id','id_proye')->join('maquinaria','cont_id','id_cont')->where('id_proye','=',$aux)->select('id_maq','nomb_maq','cost_h','hor_t','cont_id','codigo_mt')->get();
                         $item=DB::table('maquinaria')->count();
                         $user=session()->get('id');
                         if($item>=0){
                            for($x=0;count($selecMaq)>$x;$x++){
                                $unid='hr';
                                $nomb=$selecMaq[$x]->nomb_maq;
                                $cod=$selecMaq[$x]->codigo_mt;
                                $cost=$selecMaq[$x]->cost_h;
                                $cant=$selecMaq[$x]->hor_t;
                                $total=$cost*$cant;

                                $insert=DB::table('tabla_maqui')->insert(['numtab'=>$cod,'descrpma'=>$nomb,'unidmq'=>$unid,'cantidhor'=>$cant,'precioxh'=>$cost,'total_cos'=>$total,'proy_id'=>$aux,'user_id'=>$user[0]]);


                               }
                               $selMat=DB::table('tabla_maqui')->where('user_id','=',$user[0])->where('proy_id','=',$aux)->select('numtab','descrpma','cantidhor','precioxh','total_cos','unidmq')->get();

                               return $selMat;


                        }else{
                            $insert=DB::table('tabla_maqui')->insert(['numtab'=>'-','descrpma'=>'-','unidmq'=>'-','cantidhor'=>'0','precioxh'=>'0','total_cos'=>'0','proy_id'=>$aux,'user_id'=>$user[0]]);
                            $selMat=DB::table('tabla_maqui')->where('user_id','=',$user[0])->where('proy_id','=',$aux)->select('numtab','descrpma','cantidhor','precioxh','total_cos','unidmq')->get();

                            return $selMat;
                        }


                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');

            }
            private function cotimab($aux){
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){
                        $selecMan=DB::table('proyecto')->join('construccion','proyecto_id','id_proye')->join('manob','cont_id','id_cont')->where('id_proye','=',$aux)->select('id_mano','nomb_ca','c_hor','total_h','cont_id','codigo')->get();
                        $item2=DB::table('manob')->count();
                        $user=session()->get('id');

                        if($item2>=0){
                            for($x=0;count($selecMan)>$x;$x++){
                                $unid='hr';
                                $nomb=$selecMan[$x]->nomb_ca;
                                $cod=$selecMan[$x]->codigo;
                                $cost=$selecMan[$x]->total_h;
                                $cant=$selecMan[$x]->c_hor;
                                $total=$cost*$cant;
                                $insert=DB::table('tabla_manob')->insert(['numtab'=>$cod,'descrip'=>$nomb,'unid'=>$unid,'cantidad'=>$cant,'precioprod'=>$cost,'cost'=>$total,'proy_id'=>$aux,'user_id'=>$user[0]]);
                            }
                            $selMat=DB::table('tabla_manob')->where('user_id','=',$user[0])->where('proy_id','=',$aux)->select('numtab','descrip','cantidad','precioprod','cost','unid')->get();

                            return $selMat;

                        }else{
                            $insert=DB::table('tabla_manob')->insert(['numtab'=>'-','descrip'=>'-','unid'=>'-','cantidad'=>'0','precioprod'=>'0','cost'=>'0','proy_id'=>$aux,'user_id'=>$user[0]]);
                            $selMat=DB::table('tabla_manob')->where('user_id','=',$user[0])->where('proy_id','=',$aux)->select('numtab','descrip','cantidad','precioprod','cost','unid')->get();

                            return $selMat;

                        }


                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');

            }


            public function registroIn (){
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){

                        $selectproy=DB::table('proyecto')->join('usr','id_usr','user_idp')->join('persona','ci','ci_per')->select('persona.ci','persona.nombre','proyecto.nombr_proy','fechap','user_idp')->get();

                        $selectconst=DB::table('construccion')->join('usr','id_usr','user_idc')->join('proyecto','id_proye','proyecto_id')->select('usr.ci_per','proyecto.nombr_proy','nombr_c','fecha','user_idc')->get();

                        $selectmaq=DB::table('maquinaria')->join('usr','id_usr','user_idmq')->join('construccion','id_cont','cont_id')->join('proyecto','id_proye','proyecto_id')->select('usr.ci_per','proyecto.nombr_proy','nombr_c','nomb_maq','fechamq','user_idmq')->get();

                        $selectmanb=DB::table('manob')->join('usr','id_usr','user_idmb')->join('construccion','id_cont','cont_id')->join('proyecto','id_proye','proyecto_id')->select('usr.ci_per','proyecto.nombr_proy','nombr_c','nomb_ca','fechamb','user_idmb')->get();

                        $selectmat=DB::table('material')->join('usr','id_usr','user_idmt')->join('construccion','id_cont','cont_id')->join('proyecto','id_proye','proyecto_id')->select('usr.ci_per','proyecto.nombr_proy','nombr_c','nomb_mat','fechamt','user_idmt')->get();
                        return view('eduards.tablainsert',compact('selectproy','selectconst','selectmaq','selectmanb','selectmat'));
                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');

            }

            public function  registroDe(){
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){
                        $resp=DB::table('deliminar')->select('pory','constr','nombre_act','ciper','user_ids','fech')->get();
                        return view('eduards.tablaseliminados',compact('resp'));
                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');

            }

            public function  registroUp(){
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){

                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');

            }
            public function tablait(){
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){
                        $selec=DB::table('unid_pro')->select('id_md','nombre','abre')->get();
                            return view('eduards.tablasitem',compact('selec'));
                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');

            }
            public function tablaunid(){
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){
                            $selec=DB::table('unidamed')->select('id_med','nombr_m','abre')->get();
                            return view('eduards.tablaUnit',compact('selec'));
                        }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');

            }
                public function editsItem($id){
                     if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){

                        $val=DB::table('unid_pro')->select('id_md','nombre','abre')->get();
                        return view('eduards.editItem',compact('val'));
                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');
                }
                public function editsUnid($id){
                     if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){
                        $val=DB::table('unidamed')->select('id_med','nombr_m','abre')->get();
                        return view('eduards.editunid',compact('val'));
                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');
                }
                public function insertItem(){


                     if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){

                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');
                }
                public function insertUnid(){


                    if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){

                    }else
                    return redirect()->route('login')
                    ->with('info');

                }else return redirect()->route('login')
                ->with('info');
                }

            public function imprimir(){
                $pdf = \PDF::loadView('eduards.tablares');
                return $pdf->download('ejemplo.pdf');
           }

           public function nuevop(){
            if(session()->get('id') ?? ''){
                $maxs=Rol::max('id_rol');
                if(session()->get('user_rol')->first()<=$maxs){
                    $selec=DB::table('nomb_items')->select('nombr_item','unid','precio','codigo_it')->get();
                    return view('eduards.nuevop',compact('selec'));

                }else
                return redirect()->route('login')
                ->with('info');

            }else return redirect()->route('login')
            ->with('info');
           }
           public function insertprecio(Request $request){
            $this->validate(
                $request,
                    [

                        'codigo'=>'required|string|max:255',
                        'precio' =>'required|numeric',
                        ] );
                    $pro=$request->input('codigo');
                    $carga=$request->input('precio');
                    if(session()->get('id') ?? ''){
                        $maxs=Rol::max('id_rol');
                        if(session()->get('user_rol')->first()<=$maxs){
                            $date = Carbon::now();
                            $datf = $date->format('Y-m-d');
                            $selec=DB::table('nomb_items')->where('activo','=',TRUE)->where('codigo_it','=',$pro)->select('id_item','nombr_item','unid','precio','codigo_it','codigo_tipo')->get();
                                $id_i=$selec[0]->id_item;
                                $nom=$selec[0]->nombr_item;
                                $unid=$selec[0]->unid;
                                $codigo=$selec[0]->codigo_it;
                                $precio=$selec[0]->precio;
                                $codigo_t=$selec[0]->codigo_tipo;
                                $insert=DB::table('nomb_items')->insert(['unid'=>$unid,'precio'=>$carga,'codigo_it'=>$codigo,'codigo_tipo'=>$codigo_t,'nombr_item'=> $nom,'activo'=>TRUE ,'fecha_e'=>$datf]);
                                $actualizar=DB::table('nomb_items')->where('id_item','=',$id_i)->update(['activo'=>false]);
                                return redirect()->route('tablaunid');
                            }else
                        return redirect()->route('login')
                        ->with('info');

                    }else return redirect()->route('login')
                    ->with('info');


           }
           public function tablaItmes(){
            if(session()->get('id') ?? ''){
                $maxs=Rol::max('id_rol');
                if(session()->get('user_rol')->first()<=$maxs){
                    $selec=DB::table('nomb_items')->where('activo','=',TRUE)->select('nombr_item','unid','precio','codigo_it')->get();
                    return view('eduards.tabla_item',compact('selec'));
                }else
                return redirect()->route('login')
                ->with('info');

            }else return redirect()->route('login')
            ->with('info');
           }
           public function histop($id){
            if(session()->get('id') ?? ''){
                $maxs=Rol::max('id_rol');
                if(session()->get('user_rol')->first()<=$maxs){
                    $selec=DB::table('nomb_items')->where('codigo_it','=',$id)->select('nombr_item','unid','precio','codigo_it','fecha_e')->get();
                    return view('eduards.tabla_hist',compact('selec'));
                }else
                return redirect()->route('login')
                ->with('info');

            }else return redirect()->route('login')
            ->with('info');

           }
           public function tablaSubp(){
            if(session()->get('id') ?? ''){
                $maxs=Rol::max('id_rol');
                if(session()->get('user_rol')->first()<=$maxs){
                    $selec=DB::table('nombr_s')->select('nombr_subp','unid_sup','codigo')->get();
                    return view('eduards.tabla_subp',compact('selec'));
                }else
                return redirect()->route('login')
                ->with('info');

            }else return redirect()->route('login')
            ->with('info');
           }
           public function formulariosubp($id){
            if(session()->get('id') ?? ''){
                $maxs=Rol::max('id_rol');
                if(session()->get('user_rol')->first()<=$maxs){
                    $aux=$id;
                    $sub=DB::table('nombr_s')->select('nombr_subp','unid_sup','codigo')->get();
                    $subp=DB::table('nombr_s')->select('nombr_subp','unid_sup','codigo')->get();

                    $selec=DB::table('nomb_items')->where('activo','=',TRUE)->select('nombr_item','unid','precio','codigo_it','fecha_e')->get();
                    return view('eduards.formu_activi',compact('aux','subp','selec'));
                }else
                return redirect()->route('login')
                ->with('info');

            }else return redirect()->route('login')
            ->with('info');
           }
           public function insertactivid(Request $request){
            $this->validate(
                $request,
                    [
                        'number'=>'required|integer',
                        'subp'=>'required|string|max:255',
                        'codigo'=>'required|string|max:255',
                        'cant' =>'required|numeric',
                        ] );
                    $numberp=$request->input('number');
                    $cod=$request->input('subp');
                    $codigoi=$request->input('codigo');
                    $cant=$request->input('cant');
                    $idus=session()->get('user_rol')->first();
                    $date = Carbon::now();
                    $datf = $date->format('Y-m-d');

                        $auxi=DB::table('nombr_s')->where('codigo','=',$cod)->select('nombr_subp','unid_sup')->get();
                        $nombsub=$auxi[0]->nombr_subp;
                        $unidsub=$auxi[0]->unid_sup;
                        $id_uni=DB::table('unid_pro')->where('abre','=',$unidsub)->pluck('id_md')->first();
                        $val=DB::table('nomb_items')->where('nombr_item','=',$codigoi)->where('activo','=',TRUE)->select('nombr_item','unid','precio','codigo_it','codigo_tipo','fecha_e')->get();
                        $val1=DB::table('construccion')->where('proyecto_id','=',$numberp)->where('codigo_subp','=',$cod)->count();
                        $nombI=$val[0]->nombr_item;
                        $Iunid=$val[0]->unid;
                        $Iprec=$val[0]->precio;
                        $Icodigo=$val[0]->codigo_it;
                        $Itipo=$val[0]->codigo_tipo;
                        if($val1==0){
                                $insert=DB::table('construccion')->insert(['nombr_c'=>$nombsub,'proyecto_id'=>$numberp,'und_id'=>$id_uni,'user_idc'=>$idus,'fecha'=>$datf,'codigo_subp'=>$cod]);
                                $id_const=DB::table('construccion')->where('codigo_subp','=',$cod)->where('proyecto_id','=',$numberp)->first('id_cont');

                                if($Itipo=='MATR'){
                                    $may=DB::table('material')->max('id_mate');
                                    $max=$may+1;
                                    $cod='Mat'.$max;
                                    $unid=DB::table('unidamed')->where('abre','=',$Iunid)->first('id_med');
                                    $au=DB::table('unidamed')->where('id_med','=',9)->select('abre')->get();
                                    $insertar=DB::table('material')->insert(['nomb_mat'=>$nombI,'cont_id'=>$id_const->id_cont,'unid_med'=>$unid->id_med,'cantid_ma'=>$cant,'cost_unidad'=>$Iprec,'codigo_mat'=>$cod,'user_idmt'=>$idus,'fechamt'=>$datf]);

                                }
                                if($Itipo=='MANOBRA'){
                                    $may=DB::table('manob')->max('id_mano');
                                    $max=$may+1;
                                    $cod='Mano'.$max;
                                    $insert=DB::table('manob')->insert(['nomb_ca'=>$nombI,'c_hor'=>$Iprec,'total_h'=>$cant,'cont_id'=>$id_const->id_cont,'codigo'=>$cod,'user_idmb'=>$idus,'fechamb'=>$datf]);

                                }
                                if($Itipo=='MAQUIEQ'){
                                    $may=DB::table('maquinaria')->max('id_maq');
                                    $max=$may+1;
                                    $cod='Maq'.$max;
                                    $insert=DB::table('maquinaria')->insert(['nomb_maq'=>$nombI,'cost_h'=>$Iprec,'hor_t'=>$cant,'cont_id'=>$id_const->id_cont,'codigo_mt'=>$cod,'user_idmq'=>$idus,'fechamq'=>$datf]);
                                }
                                return  redirect()->action('eduardas@tablact', $numberp);

                            }else{
                                $id_const=DB::table('construccion')->where('codigo_subp','=',$cod)->where('proyecto_id','=',$numberp)->first('id_cont');

                                if($Itipo=='MATR'){
                                    $may=DB::table('material')->max('id_mate');
                                    $max=$may+1;
                                    $cod='Mat'.$max;
                                    $unid=DB::table('unidamed')->where('abre','=',$Iunid)->first('id_med');
                                    $au=DB::table('unidamed')->where('id_med','=',9)->select('abre')->get();
                                    $insertar=DB::table('material')->insert(['nomb_mat'=>$nombI,'cont_id'=>$id_const->id_cont,'unid_med'=>$unid->id_med,'cantid_ma'=>$cant,'cost_unidad'=>$Iprec,'codigo_mat'=>$cod,'user_idmt'=>$idus,'fechamt'=>$datf]);

                                }
                                if($Itipo=='MANOBRA'){
                                    $may=DB::table('manob')->max('id_mano');
                                    $max=$may+1;
                                    $cod='Mano'.$max;
                                    $insert=DB::table('manob')->insert(['nomb_ca'=>$nombI,'c_hor'=>$Iprec,'total_h'=>$cant,'cont_id'=>$id_const->id_cont,'codigo'=>$cod,'user_idmb'=>$idus,'fechamb'=>$datf]);

                                }
                                if($Itipo=='MAQUIEQ'){
                                    $may=DB::table('maquinaria')->max('id_maq');
                                    $max=$may+1;
                                    $cod='Maq'.$max;
                                    $insert=DB::table('maquinaria')->insert(['nomb_maq'=>$nombI,'cost_h'=>$Iprec,'hor_t'=>$cant,'cont_id'=>$id_const->id_cont,'codigo_mt'=>$cod,'user_idmq'=>$idus,'fechamq'=>$datf]);
                                }
                                return  redirect()->action('eduardas@tablact', $numberp);

                        }
                    }
                    public function formula_edit($id){
                        if(session()->get('id') ?? ''){
                            $maxs=Rol::max('id_rol');
                            if(session()->get('user_rol')->first()<=$maxs){
                                $aux=$id;

                               $count=DB::table('material')->where('codigo_mat','=',$aux)->count();
                                $count1=DB::table('maquinaria')->where('codigo_mt','=',$aux)->count();
                                $count2=DB::table('manob')->where('codigo','=',$aux)->count();
                               if($count==1){
                                $resul=DB::table('material')->where('codigo_mat','=',$aux)->first('nomb_mat');
                                $resul1=DB::table('material')->where('codigo_mat','=',$aux)->first('cantid_ma');
                                $codi=DB::table('nomb_items')->where('nombr_item','=',$resul->nomb_mat)->select('nombr_item','codigo_it')->get();
                                $nomb_co=$codi[0]->nombr_item;
                                $num_cod=$codi[0]->codigo_it;
                                $cant_i=$resul1->cantid_ma;
                                $cod_t=DB::table('nomb_items')->where('nombr_item','=',$nomb_co)->first('codigo_tipo');

                                $subp=DB::table('nombr_s')->select('nombr_subp','unid_sup','codigo')->get();
                                $selec=DB::table('nomb_items')->where('codigo_tipo','=',$cod_t->codigo_tipo)->where('activo','=',TRUE)->select('nombr_item','unid','precio','codigo_it','fecha_e')->get();
                                return view('eduards.edit_form',compact('aux','nomb_co','cod_t','num_cod','cant_i','subp','selec'));

                               }
                               if($count1==1){

                                $resul=DB::table('maquinaria')->where('codigo_mt','=',$aux)->first('nomb_maq');
                                $resul1=DB::table('maquinaria')->where('codigo_mt','=',$aux)->first('hor_t');
                                $codi=DB::table('nomb_items')->where('nombr_item','=',$resul->nomb_mat)->select('nombr_item','codigo_it')->get();
                                $nomb_co=$codi[0]->nombr_item;
                                $num_cod=$codi[0]->codigo_it;
                                $cant_i=$resul1->cantid_ma;
                                $cod_t=DB::table('nomb_items')->where('nombr_item','=',$nomb_co)->first('codigo_tipo');

                                $subp=DB::table('nombr_s')->select('nombr_subp','unid_sup','codigo')->get();
                                $selec=DB::table('nomb_items')->where('codigo_tipo','=',$cod_t->codigo_tipo)->where('activo','=',TRUE)->select('nombr_item','unid','precio','codigo_it','fecha_e')->get();
                                return view('eduards.edit_form',compact('aux','nomb_co','cod_t','num_cod','cant_i','subp','selec'));

                               }
                               if($count2==1){
                                $resul=DB::table('manob')->where('codigo','=',$aux)->first('nomb_ca');
                                $resul1=DB::table('manob')->where('codigo','=',$aux)->first('total_h');
                                $codi=DB::table('nomb_items')->where('nombr_item','=',$resul->nomb_mat)->select('nombr_item','codigo_it')->get();
                                $nomb_co=$codi[0]->nombr_item;
                                $num_cod=$codi[0]->codigo_it;
                                $cant_i=$resul1->cantid_ma;
                                $cod_t=DB::table('nomb_items')->where('nombr_item','=',$nomb_co)->first('codigo_tipo');

                                $subp=DB::table('nombr_s')->select('nombr_subp','unid_sup','codigo')->get();
                                $selec=DB::table('nomb_items')->where('codigo_tipo','=',$cod_t->codigo_tipo)->where('activo','=',TRUE)->select('nombr_item','unid','precio','codigo_it','fecha_e')->get();
                                return view('eduards.edit_form',compact('aux','nomb_co','cod_t','num_cod','cant_i','subp','selec'));

                               }
                                }else
                            return redirect()->route('login')
                            ->with('info');

                        }else return redirect()->route('login')
                        ->with('info');
                    }
                    public function insertaredit(Request $request){
                        $this->validate(
                            $request,
                                [
                                    'number'=>'required|string|max:255',

                                    'codigo'=>'required|string|max:255',
                                    'cant' =>'required|numeric',
                                    ] );
                                $numberp=$request->input('number');
                                $codigoi=$request->input('codigo');
                                $cant=$request->input('cant');
                                $count=DB::table('material')->where('codigo_mat','=',$numberp)->count();
                                $count1=DB::table('maquinaria')->where('codigo_mt','=',$numberp)->count();
                                $count2=DB::table('manob')->where('codigo','=',$numberp)->count();
                                   if($count==1){
                                    $sel=DB::table('material')->where('codigo_mat','=',$numberp)->first('nomb_mat');
                                    $nomb_i=DB::table('nomb_items')->where('nombr_item','=',$codigoi)->first('unid');
                                    $id_unid=DB::table('unidamed')->where('abre','=',$nomb_i->unid)->first('id_med');
                                    $update=DB::table('material')->where('codigo_mat','=',$numberp)->update(['nomb_mat'=>$codigoi,'unid_med'=>$id_unid->id_med,'cantid_ma'=>$cant]);

                                }
                                   if($count1==1){
                                        $selec=DB::table('maquinaria')->where('codigo_mt','=',$numberp)->first('nomb_maq');
                                        $nomb_i=DB::table('nomb_items')->where('nombr_item','=',$codigoi)->first('unid');
                                        $id_unid=DB::table('unidamed')->where('abre','=',$nomb_i->unid)->first('id_med');
                                        $update=DB::table('maquinaria')->where('codigo_mt','=',$numberp)->update(['nomb_maq'=>$codigoi,'unid_med'=>$id_unid->id_med,'cantid_ma'=>$cant]);
                                    }
                                   if($count2==1){
                                        $sel=DB::table('manob')->where('codigo','=',$numberp)->first('nomb_ca');
                                   }





                    }
}
