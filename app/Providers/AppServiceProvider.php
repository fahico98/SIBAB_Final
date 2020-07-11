<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\datos_aprendices;
use App\Models\socioeconomico;
use App\Models\DiaAsistencia;
use App\Models\Postulados;
use App\Models\User;
use Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Blade::if('isNotPostulado', function ($id_convocatoria, $id_usuario) {
            return !Postulados::where("id_usuario", $id_usuario)
                ->where("id_convocatoria", $id_convocatoria)
                ->exists();
        });

        Blade::if('asistencia', function ($id_socioeconomico, $id_dia) {

            $datos_aprendiz = socioeconomico::where("id_socioeconomico", $id_socioeconomico)
                ->select("id_datos_aprendiz")
                ->get();

            $email = datos_aprendices::where("id_datos_aprendiz", $datos_aprendiz[0]->id_datos_aprendiz)
                ->select("email")
                ->get();

            $usuario = User::where("email", $email[0]->email)
                ->select("id_usuario")
                ->get();

            $asistencia = DiaAsistencia::where("id_usuario", $usuario[0]->id_usuario)
                ->where("id", $id_dia)
                ->get();

            return count($asistencia) > 0 ? $asistencia[0]->asistencia == 1 : false;
        });

        Blade::if("diaasociado", function($id_socioeconomico, $id_dia){

            $datos_aprendiz = socioeconomico::where("id_socioeconomico", $id_socioeconomico)
                ->select("id_datos_aprendiz")
                ->get();

            $email = datos_aprendices::where("id_datos_aprendiz", $datos_aprendiz[0]->id_datos_aprendiz)
                ->select("email")
                ->get();

            $usuario = User::where("email", $email[0]->email)
                ->select("id_usuario")
                ->get();

            return DiaAsistencia::where("id_usuario", $usuario[0]->id_usuario)
                ->where("id", $id_dia)
                ->exists();
        });
    }
}
