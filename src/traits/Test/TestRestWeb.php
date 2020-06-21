<?php

namespace Happy\Traits\Test;

/**
 * @method testCreate
 * @method testEdit
 */
Trait TestRestWeb
{
    /**
     * Create.
     *
     * Ensure return 200
     *
     * @return void
     */
    public function testCreate()
    {
        $this->get(route($this->route . '.create'))
            ->assertStatus(200);
    }

    /**
     * Edit.
     *
     * Ensure return 200
     *
     * @return void
     */
    public function testEdit()
    {
        $model = factory($this->model)->create();

        $this->get(route($this->route . '.edit', [$this->route => $model->id]))
            ->assertStatus(200);
    }

     /**
     * Edit an unknow model.
     *
     * Ensure return 404 Not Found
     *
     * @return void
     */
    public function testEditUnknow()
    {
        $this->get(route($this->route . '.edit', [$this->route => 0]))
            ->assertStatus(404);
    }
}
