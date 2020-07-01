<?php

namespace Ezamlinux\Happy\Traits\Test;

/**
 * @method testIndex
 * @method testShow
 * @method testStore
 * @method testUpdate
 * @method testUpdateUnknow
 * @method testDelete
 * @method testDeleteTwice
 */
Trait TestRestApi
{
    /**
     * Index.
     *
     * Ensure return 200
     *
     * @return void
     */
    public function testIndex()
    {
        $this->actingAs($this->actingAs, 'api')
            ->getJson(route($this->route . '.index'))
            ->assertStatus(200);
    }

    /**
     * Store.
     *
     * Ensure return 201
     *
     * @return void
     */
    public function testStore()
    {
        $this->actingAs($this->actingAs, 'api')
            ->postJson(route($this->route . '.store'), factory($this->model)->make()->toArray())
            ->assertCreated(201);
    }

    /**
     * Show.
     *
     * Ensure return 200
     *
     * @return void
     */
    public function testShow()
    {
        $model = factory($this->model)->create();

        $this->actingAs($this->actingAs, 'api')
            ->getJson(route($this->route . '.show', [$this->route => $model->id]))
            ->assertStatus(200);
    }

    /**
     * Update.
     *
     * Ensure return 200
     *
     * @return void
     */
    public function testUpdate()
    {
        $model = factory($this->model)->create();

        $this->actingAs($this->actingAs, 'api')
            ->putJson(route($this->route . '.update', [$this->route => $model->id]), factory($this->model)->make()->toArray())
            ->assertStatus(200);
    }

    /**
     * Update an inexisting model.
     *
     * Ensure return 404
     *
     * @return void
     */
    public function testUpdateUnknow()
    {
        $this->actingAs($this->actingAs, 'api')
            ->putJson(route($this->route . '.update', [$this->route => 0]), [])
            ->assertStatus(404);
    }

    /**
     * Delete.
     *
     * Ensure 204 No Content
     *
     * @return void
     */
    public function testDelete()
    {
        $model = factory($this->model)->create();

        $this->actingAs($this->actingAs, 'api')
            ->deleteJson(route($this->route . '.destroy', [$this->route => $model->id]))
            ->assertNoContent();

        $this->assertDeleted($model);
    }

     /**
     * Delete an item twice.
     *
     * Ensure 404 Not Found
     *
     * @return void
     */
    public function testDeleteTwice()
    {
        $model = factory($this->model)->create();

        $this->actingAs($this->actingAs, 'api')
            ->deleteJson(route($this->route . '.destroy', [$this->route => $model->id]))
            ->assertNoContent();

        $this->assertDeleted($model);

        $this->actingAs($this->actingAs, 'api')
            ->deleteJson(route($this->route . '.destroy', [$this->route => $model->id]))
            ->assertStatus(404);
    }
}
