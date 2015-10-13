# tale-jade-smvc
Tale Jade Implementation into the PHP Simple MVC Framework

# Short introduction

Simply add following into the `Core\Controller` Class:

    $this->renderer = new \Tale\Jade\Renderer([
        'paths' => [__DIR__.'/../views']
    ]);

That's it! Now instead using the `View::render[Template]` Methods, you can use:

    echo $this->renderer->render('filename', ['data' => $data]);

    