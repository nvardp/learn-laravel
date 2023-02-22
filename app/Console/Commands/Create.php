<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

define("YES", "yes");
define("NO", "no");
class Create extends Command
{
    public const paths = [  "TEMPLATES" =>  "app/Console/Commands/templates/" ,
                            "CONTROLLER"=> "app/Http/Controllers/",
                            "REQUEST" => "app/Http/Requests/",
                            "RESOURCE" => "app/Http/Resources/",
                            "TRANSFORMER" => "app/Models/",
                            "MODEL" => "app/Models/",
                            "POLICY" => "app/Policies/"];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:crud {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(self::createController())
            $this->info('Controller [' .base_path() . DIRECTORY_SEPARATOR . self::paths['CONTROLLER'] . $this->argument('name') ."Controller.php]  created successfully.");
        else
            $this->error("Cannot create Controller class");

        if(self::createModel())
            $this->info('Model [' .base_path() . DIRECTORY_SEPARATOR . self::paths['MODEL'] . $this->argument('name') .".php]  created successfully.");
        else
            $this->error("Cannot create Model class");

        if(self::createRequest())
            $this->info('Request [' .base_path() . DIRECTORY_SEPARATOR . self::paths['MODEL'] . $this->argument('name') ."Request.php]  created successfully.");
        else
            $this->error("Cannot create Request class");

        if(self::createTransformer())
            $this->info('Transformer [' .base_path() . DIRECTORY_SEPARATOR . self::paths['TRANSFORMER'] . $this->argument('name') ."Transformer.php]  created successfully.");
        else
            $this->error("Cannot create Transformer class");

        if(self::createPolicy())
            $this->info('Policy [' .base_path() . DIRECTORY_SEPARATOR . self::paths['POLICY'] . $this->argument('name') ."Policy.php]  created successfully.");
        else
            $this->error("Cannot create Policy class");

        if(self::createResource())
            $this->info('Resource [' .base_path() . DIRECTORY_SEPARATOR . self::paths['RESOURCE'] . $this->argument('name') ."Resource.php]  created successfully.");
        else
            $this->error("Cannot create Resource class");



        return Command::SUCCESS;
    }


    private function createController()
    {
        $content = file_get_contents(self::paths['TEMPLATES'] . "Controller.txt");
        $content = str_replace("@name", $this->argument('name'), $content);
        $content = str_replace( "@varName", "$" . strtolower($this->argument('name')), $content);

        if(file_exists(self::paths['CONTROLLER'] . $this->argument('name') ."Controller.php") )
        {
            $response = $this->ask($this->argument('name') ."Controller.php already exists. Do you want override it? [yes/no]");
            if(NO == $response)
                return true;

            if(YES == $response)
            {
                $status=unlink(self::paths['CONTROLLER'] . $this->argument('name') ."Controller.php");
                if(!$status)
                    return false;
            }
        }
        $fc = fopen ( self::paths['CONTROLLER'] . $this->argument('name') ."Controller.php" , "w+");
        if($fc === false)
            return false;
        fwrite($fc, $content);
        fclose($fc);

        return true;
    }

    private function createModel()
    {
        $content = file_get_contents(self::paths['TEMPLATES'] . "Model.txt");
        $content = str_replace("@name", $this->argument('name'), $content);

        if(file_exists(self::paths['MODEL'] . $this->argument('name') .".php") )
        {
            $response = $this->ask($this->argument('name') .".php already exists. Do you want override it? [yes/no]");
            if(NO == $response)
                return true;

            if(YES == $response)
            {
                $status=unlink(self::paths['MODEL'] . $this->argument('name') .".php");
                if(!$status)
                    return false;
            }
        }
        $fc = fopen ( self::paths['MODEL'] . $this->argument('name') .".php" , "w+");
        if($fc === false)
            return false;
        fwrite($fc, $content);
        fclose($fc);

        return true;
    }

    private function createRequest()
    {
        $content = file_get_contents(self::paths['TEMPLATES'] . "Request.txt");
        $content = str_replace("@name", $this->argument('name'), $content);

        if(file_exists(self::paths['REQUEST'] . $this->argument('name') ."Request.php") )
        {
            $response = $this->ask($this->argument('name') .".php already exists. Do you want override it? [yes/no]");
            if(NO == $response)
                return true;

            if(YES == $response)
            {
                $status=unlink(self::paths['REQUEST'] . $this->argument('name') ."Request.php");
                if(!$status)
                    return false;
            }
        }
        $fc = fopen ( self::paths['REQUEST'] . $this->argument('name') ."Request.php" , "w+");
        if($fc === false)
            return false;
        fwrite($fc, $content);
        fclose($fc);

        return true;
    }

    private function createTransformer()
    {
        $content = file_get_contents(self::paths['TEMPLATES'] . "Transformer.txt");
        $content = str_replace("@name", $this->argument('name'), $content);
        $content = str_replace( "@varName", "$" . strtolower($this->argument('name')), $content);

        if(file_exists(self::paths['TRANSFORMER'] . $this->argument('name') ."Transformer.php") )
        {
            $response = $this->ask($this->argument('name') ."Transformer.php already exists. Do you want override it? [yes/no]");
            if(NO == $response)
                return true;

            if(YES == $response)
            {
                $status=unlink(self::paths['TRANSFORMER'] . $this->argument('name') ."Transformer.php");
                if(!$status)
                    return false;
            }
        }
        $fc = fopen ( self::paths['TRANSFORMER'] . $this->argument('name') ."Transformer.php" , "w+");
        if($fc === false)
            return false;
        fwrite($fc, $content);
        fclose($fc);

        return true;
    }

    private function createPolicy()
    {
        $content = file_get_contents(self::paths['TEMPLATES'] . "Policy.txt");
        $content = str_replace("@name", $this->argument('name'), $content);
        $content = str_replace( "@varName", "$" . strtolower($this->argument('name')), $content);

        if(file_exists(self::paths['POLICY'] . $this->argument('name') ."Policy.php") )
        {
            $response = $this->ask($this->argument('name') ."Policy.php already exists. Do you want override it? [yes/no]");
            if(NO == $response)
                return true;

            if(YES == $response)
            {
                $status=unlink(self::paths['POLICY'] . $this->argument('name') ."Policy.php");
                if(!$status)
                    return false;
            }
        }
        $fc = fopen ( self::paths['POLICY'] . $this->argument('name') ."Policy.php" , "w+");
        if($fc === false)
            return false;
        fwrite($fc, $content);
        fclose($fc);

        return true;
    }

    private function createResource()
    {
        $content = file_get_contents(self::paths['TEMPLATES'] . "Resource.txt");
        $content = str_replace("@name", $this->argument('name'), $content);
        $content = str_replace( "@varName", "$" . strtolower($this->argument('name')), $content);

        if(file_exists(self::paths['RESOURCE'] . $this->argument('name') ."Resource.php") )
        {
            $response = $this->ask($this->argument('name') ."Resource.php already exists. Do you want override it? [yes/no]");
            if(NO == $response)
                return true;

            if(YES == $response)
            {
                $status=unlink(self::paths['RESOURCE'] . $this->argument('name') ."Resource.php");
                if(!$status)
                    return false;
            }
        }
        $fc = fopen ( self::paths['RESOURCE'] . $this->argument('name') ."Policy.php" , "w+");
        if($fc === false)
            return false;
        fwrite($fc, $content);
        fclose($fc);

        return true;
    }
}
