<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Event\Facade;
use Tests\TestCase;

class ProjectTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testCreateProject(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(route('projects.store'), [
            'nome' => 'Meu Novo Projeto',
            'descricao' => 'Projeto sobre coisas novas',
            'status' => '1',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('projects.index'));
        $this->assertDatabaseHas('projects', ['nome' => 'Meu Novo Projeto']);
    }

    public function testUpdateCreatedProject(): void
    {
        $project = Project::factory()->create([
            'nome' => 'Meu Novo Projeto', // Nome inicial do projeto
            'descricao' => 'Projeto sobre coisas novas',
            'status' => 1,
        ]);

        $user = User::factory()->create();

        $response = $this->actingAs($user)->patch(route('projects.update', ['project' => $project->id]), [
            'nome' => 'Meu Novo Projeto Atualizado',
            'descricao' => 'Projeto sobre coisas novas atualizadas',
            'status' => 3,
        ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('projects.index'));

        $project->refresh();

        $this->assertSame('Meu Novo Projeto Atualizado', $project->nome);
        $this->assertSame('Projeto sobre coisas novas atualizadas', $project->descricao);
        $this->assertSame(3, $project->status);
    }
}

