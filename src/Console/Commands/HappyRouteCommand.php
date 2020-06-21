<?php

namespace Happy\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Route;

class HappyRouteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'happy:route';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate route to json format';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->writeJson($this->generateRoutes());
        return;
    }

    /**
     * @return array
     */
    public function generateRoutes() : array
    {
        $routes = [];
        foreach (Route::getRoutes()->getRoutes() as $route) {
            if (is_null($route->getName()))
                continue;
            if (isset( $routes[$route->getName()]))
                $this->comment("Overwriting duplicate named route: " . $route->getName());
            $routes[$route->getName()] = [
               'method' => $route->methods(),
                'uri' => config('happy.route.prefix_url', '') ."/" . $route->uri()
            ];
        }
        return $routes;
    }

    /**
     * @param array routes
     */
    protected function writeJson(array $routes)
    {
        $filename = config('happy.route.json_path', 'resources/js/routes.json');

        if (!$handle = fopen($filename, 'w')) {
            $this->error( "Cannot open file: $filename" );
            return;
        }

        // Write $somecontent to our opened file.
        if (fwrite($handle, json_encode($routes)) === FALSE) {
            $this->error("Cannot write to file: $filename" );
            return;
        }

        $this->info("Wrote routes to: $filename");

        fclose($handle);
    }
}
