<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\SiteImovelController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Site\PaginaController;
use App\Http\Controllers\Admin\PaginaAdminController;
use App\Http\Controllers\Admin\TipoController;
use App\Http\Controllers\Admin\CidadeController;
use App\Http\Controllers\Admin\ImovelController;
use App\Http\Controllers\Admin\GaleriaController;
use App\Http\Controllers\Admin\SlideController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('site.home');

Route::get('/imovel/{id}/{titulo?}', [SiteImovelController::class, 'index'])->name('site.imovel');

Route::get('/busca', [HomeController::class, 'busca'])->name('site.busca');

Route::get('/sobre', [PaginaController::class, 'sobre'])->name('site.sobre');

Route::get('/contato', [PaginaController::class, 'contato'])->name('site.contato');
Route::post('/contato/enviar', [PaginaController::class, 'enviarContato'])->name('site.contato.enviar');



/* Rotas do Sistema de Administração */
Route::get('/admin/logar', function () {
    return view('admin.login.index');
})->name('admin.logar');

Route::post('adim/login', [UsuarioController::class, 'login'])->name('admin.login');

Route::middleware(['auth'])->group(function () {

    Route::get('/admin', function () {
        return view('admin.principal.index');
    })->name('admin.principal');

    Route::get('/admin/logout', [UsuarioController::class, 'logout'])->name('admin.logout');

    Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios');
    Route::get('/admin/usuarios/adicionar', [UsuarioController::class, 'adicionar'])->name('admin.usuarios.adicionar');
    Route::post('/admin/usuarios/salvar', [UsuarioController::class, 'salvar'])->name('admin.usuarios.salvar');
    Route::get('/admin/usuarios/editar/{id}', [UsuarioController::class, 'editar'])->name('admin.usuarios.editar');
    Route::put('/admin/usuarios/atualizar/{id}', [UsuarioController::class, 'atualizar'])->name('admin.usuarios.atualizar');
    Route::get('/admin/usuarios/deletar/{id}', [UsuarioController::class, 'deletar'])->name('admin.usuarios.deletar');

    Route::get('/admin/tipos', [TipoController::class, 'index'])->name('admin.tipos');
    Route::get('/admin/tipos/adicionar', [TipoController::class, 'adicionar'])->name('admin.tipos.adicionar');
    Route::post('/admin/tipos/salvar', [TipoController::class, 'salvar'])->name('admin.tipos.salvar');
    Route::get('/admin/tipos/editar/{id}', [TipoController::class, 'editar'])->name('admin.tipos.editar');
    Route::put('/admin/tipos/atualizar/{id}', [TipoController::class, 'atualizar'])->name('admin.tipos.atualizar');
    Route::get('/admin/deletar/{id}', [TipoController::class, 'deletar'])->name('admin.tipos.deletar');

    Route::get('/admin/cidades', [CidadeController::class, 'index'])->name('admin.cidades');
    Route::get('/admin/cidades/adicionar', [CidadeController::class, 'adicionar'])->name('admin.cidades.adicionar');
    Route::post('/admin/cidades/salvar', [CidadeController::class, 'salvar'])->name('admin.cidades.salvar');
    Route::get('/admin/cidades/editar/{id}', [CidadeController::class, 'editar'])->name('admin.cidades.editar');
    Route::put('/admin/cidades/atualizar/{id}', [CidadeController::class, 'atualizar'])->name('admin.cidades.atualizar');
    Route::get('/admin/cidades/deletar/{id}', [CidadeController::class, 'deletar'])->name('admin.cidades.deletar');

    Route::get('/admin/imoveis', [ImovelController::class, 'index'])->name('admin.imoveis');
    Route::get('/admin/imoveis/adicionar', [ImovelController::class, 'adicionar'])->name('admin.imoveis.adicionar');
    Route::post('/admin/imoveis/salvar', [ImovelController::class, 'salvar'])->name('admin.imoveis.salvar');
    Route::get('/admin/imoveis/editar/{id}', [ImovelController::class, 'editar'])->name('admin.imoveis.editar');
    Route::put('/admin/imoveis/atualizar/{id}', [ImovelController::class, 'atualizar'])->name('admin.imoveis.atualizar');
    Route::get('/admin/imoveis/deletar/{id}', [ImovelController::class, 'deletar'])->name('admin.imoveis.deletar');

    Route::get('/admin/galerias/{imovel_id}', [GaleriaController::class, 'index'])->name('admin.galerias');
    Route::get('/admin/galerias/adicionar/{imovel_id}', [GaleriaController::class, 'adicionar'])->name('admin.galerias.adicionar');
    Route::post('/admin/galerias/salvar/{imovel_id}', [GaleriaController::class, 'salvar'])->name('admin.galerias.salvar');
    Route::get('/admin/galerias/editar/{id}', [GaleriaController::class, 'editar'])->name('admin.galerias.editar');
    Route::put('/admin/galerias/atualizar/{id}', [GaleriaController::class, 'atualizar'])->name('admin.galerias.atualizar');
    Route::get('/admin/galerias/deletar/{id}', [GaleriaController::class, 'deletar'])->name('admin.galerias.deletar');

    Route::get('/admin/slides', [SlideController::class, 'index'])->name('admin.slides');
    Route::get('/admin/slides/adicionar', [SlideController::class, 'adicionar'])->name('admin.slides.adicionar');
    Route::post('/admin/slides/salvar', [SlideController::class, 'salvar'])->name('admin.slides.salvar');
    Route::get('/admin/slides/editar/{id}', [SlideController::class, 'editar'])->name('admin.slides.editar');
    Route::put('/admin/slides/atualizar/{id}', [SlideController::class, 'atualizar'])->name('admin.slides.atualizar');
    Route::get('/admin/slides/deletar/{id}', [SlideController::class, 'deletar'])->name('admin.slides.deletar');

    Route::get('/admin/paginas', [PaginaAdminController::class, 'index'])->name('admin.paginas');
    Route::get('/admin/paginas/editar/{id}', [PaginaAdminController::class, 'editar'])->name('admin.paginas.editar');
    Route::put('/admin/paginas/atualizar/{id}', [PaginaAdminController::class, 'atualizar'])->name('admin.paginas.atualizar');

});



