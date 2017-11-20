<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Auth;
use sisVentas\User;
use sisVentas\Sucursal_User;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\UsuarioFormRequest;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use Alert;



class UsuarioController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $sucursal=Auth::user()->id_s;
            $query=trim($request->get('searchText'));
            $usuarios=DB::table('users as u')
            ->join('user_sucursal as us','us.iduser','=','u.id')
            ->select('us.iduser_sucursal','us.iduser','u.name','u.email','u.dni','u.direccion','u.password','u.foto','u.telefono','us.estado','us.m_almacen','us.m_compras','us.m_traslado','us.m_pedido','us.m_movimiento','us.m_caja','us.m_kardex','us.m_venta')
            ->where('us.idsucursal','=',$sucursal)
            ->where('name','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(7);
            return view('seguridad.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("seguridad.usuario.create");
    }
    public function store (UsuarioFormRequest $request)
    {
        try{
        $usuario=new User;
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->dni=$request->get('dni');
        $usuario->direccion=$request->get('direccion');
        $usuario->telefono=$request->get('telefono');
        $usuario->estado='Activo';
        $usuario->s_actual=0;
        $usuario->rol_actual=0;
        $usuario->id_s=0;
        $usuario->m_almacen=0;
        $usuario->m_compras=0;
        $usuario->m_traslado=0;
        $usuario->m_pedido=0;
        $usuario->m_movimiento=0;
        $usuario->m_caja=0;
        $usuario->m_kardex=0;
        $usuario->m_venta=0;
        
        $usuario->save();
        

        $number=DB::table('users')
        ->select(DB::raw('@@identity as g'))->first();
        
        
        $ultimo=$number->g;
        /*Para ver que tipo de rol le toca va ser de acuerdo al que esta logueado ya que puede ser administrador o representante :v, por lo que los roles se reducen a ser empleados, ahoara para adminsitrador se construira otro controlador claro esta si no ya fue*/
        $suc_act=Auth::user()->s_actual;
        
        if($suc_act=='Almacen-Central'){
            $tipo_user='Empleado-Almacen-Central';
        }else if($suc_act=='Almacen-Secundario'){
             $tipo_user='Empleado-Almacen-Secundario';
        }else {
             $tipo_user='Empleado-Sucursal';
        }
        /***CAPTURANDO PERMISOS***/
        $ma=$request->get('ma');
        $mc=$request->get('mc');
        $mt=$request->get('mt');
        $mp=$request->get('mp');
        $mm=$request->get('mm');
        $mj=$request->get('mj');
        $mk=$request->get('mk');
        $mv=$request->get('mv');
        
        if($ma==''){
           $ma=0; 
        }
         if($mc==''){
           $mc=0; 
        }
         if($mt==''){
           $mt=0; 
        }
         if($mp==''){
           $mp=0; 
        }
        if($mm==''){
           $mm=0; 
        }
        if($mj==''){
           $mj=0; 
        }
        if($mk==''){
           $mk=0; 
        }
        if($mv=''){
           $mv=0; 
        }
    
        /***FIN PERMISOS***/
        $sucursal=Auth::user()->id_s;
        
        $mytime = Carbon::now('America/Lima');
        DB::table('user_sucursal')->insert([
		'iduser' => $ultimo,
		'idsucursal' => $sucursal,
        'fecha' =>$mytime->toDateTimeString(),
        'estado'=>'Activo',
        'tipo_user'=>$tipo_user,
        'm_almacen'=>$ma,
        'm_compras'=>$mc,
        'm_traslado'=>$mt,
        'm_pedido'=>$mp,
        'm_movimiento'=>$mm,
        'm_caja'=>$mj,
        'm_kardex'=>$mk,
        'm_venta'=>$mv]);
          Alert::success('Usuario creado correctamente', 'Mensaje del Sistema')->persistent("Close");
            
         }catch(\Exception $e)
        {
          	DB::rollback();
             Alert::warning('Sucedio algo inesperado, usuario no creado', 'Mensaje del Sistema')->persistent("Close");
            
        }
        return Redirect::to('seguridad/usuario');
    }
    public function edit($id)
    {
        return view("seguridad.usuario.edit",["usuario"=>User::findOrFail($id)]);
    }    
    public function update(UsuarioFormRequest $request,$id)
    {
        $u_s=$id; //Esto es el indice de user_sucursal
        //CAPTURAMOS DATOS
        $name=$request->get('name');
        $email=$request->get('email');
        $dni=$request->get('dni');
        $direccion=$request->get('direccion');
        $telefono=$request->get('telefono');
        $estado=$request->get('estado');
        $user=$request->get('user'); //este es el id que capturo para editar los campos para usuario 
           $password=bcrypt($request->get('password'));
        
        //Fin de captura :D 
        
        /***CAPTURANDO PERMISOS***/
        $ma=$request->get('ma');
        $mc=$request->get('mc');
        $mt=$request->get('mt');
        $mp=$request->get('mp');
        $mm=$request->get('mm');
        $mj=$request->get('mj');
        $mk=$request->get('mk');
        $mv=$request->get('mv');
        
        if($ma==''){
           $ma=0; 
        }
         if($mc==''){
           $mc=0; 
        }
         if($mt==''){
           $mt=0; 
        }
         if($mp==''){
           $mp=0; 
        }
        if($mm==''){
           $mm=0; 
        }
        if($mj==''){
           $mj=0; 
        }
        if($mk==''){
           $mk=0; 
        }
        if($mv=''){
           $mv=0; 
        }
    
        /***FIN PERMISOS***/
        
        /*Actualizando ambas tablas :v*/
          DB::table('user_sucursal as us')
          ->where('us.iduser_sucursal', $u_s )
          ->update(['us.estado' =>$estado,'us.m_almacen'=>$ma,'us.m_compras'=>$mc,'us.m_traslado'=>$mt,'us.m_pedido'=>$mp,'us.m_movimiento'=>$mm,'us.m_caja'=>$mj,'us.m_kardex'=>$mk,'us.m_venta'=>$mv]);
       
        
         DB::table('users as u')
          ->where('u.id', $user )
          ->update(['u.name' =>$name,'u.email' =>$email,'u.dni' =>$dni,'u.direccion' =>$direccion,'u.telefono' =>$telefono,'u.password'=> $password]);
        
          Alert::success('Usuario Editado Correctamente', 'Mensaje del Sistema')->persistent("Close");
        
        
        return Redirect::to('seguridad/usuario');
    }
    
    
    public function destroy($id)
    {
       /* $usuario = DB::table('users')->where('id', '=', $id)->delete();
        return Redirect::to('seguridad/usuario');*/
        
          DB::table('user_sucursal as us')
          ->where('us.iduser_sucursal', $id )
          ->update(['us.estado' =>'Inactivo']);
        
        Alert::success('Usuario Inactivo Correctamente', 'Mensaje del Sistema')->persistent("Close");
         return Redirect::to('seguridad/usuario');
    }
    
    public function cuenta(){
        $iduser=Auth::user()->id;
        $idsucursal=Auth::user()->id_s;
        $role=Auth::user()->rol_actual;
        
        $sucursal=DB::table('sucursal')->where('idsucursal','=',$idsucursal)->get();
        
         $user=DB::table('users as u')
            ->join('user_sucursal as us','us.iduser','=','u.id')
            ->select('us.iduser_sucursal','us.iduser','u.name','u.email','u.dni','u.direccion','u.password','u.foto','u.telefono','us.estado','us.m_almacen','us.m_compras','us.m_traslado','us.m_pedido','us.m_movimiento','us.m_caja','us.m_kardex','us.m_venta','us.tipo_user','us.fecha')
            ->where('us.iduser','=',$iduser)
            ->where('us.idsucursal','=',$idsucursal)
            ->where('us.tipo_user','=',$role)
            ->get();
        
            return view('seguridad.usuario.cuenta',["user"=>$user,"sucursal"=>$sucursal]);
    }
}
