# tale-jade-smvc
Tale Jade Implementation into the PHP Simple MVC Framework

# Short introduction

Simply add following into the `Core\Controller` Class:

    $this->renderer = new \Tale\Jade\Renderer([
        'paths' => [__DIR__.'/../views']
    ]);

Also don't forget to *Add following as property:* `public $renderer;`

That's it! Now instead using the `View::render[Template]` Methods, you can use:

    echo $this->renderer->render('filename', ['data' => $data]);


The final Class should look like this:

    abstract class Controller
    {
        /**
         * view variable to use the view class
         * @var string
         */
        public $view;
        public $language;
        public $renderer;

        /**
         * on run make an instance of the config class and view class
         */
        public function __construct()
        {
            //initialise the views object
            $this->view = new View();

            //initialise the language object
            $this->language = new Language();

            $this->renderer = new \Tale\Jade\Renderer([
                'paths' => [__DIR__.'/../views']
            ]);

        }
    }

Because we didn't removed the `$view View` you still can use the `View::render[Template]` Methods if you want.

# Further Questions?

For further questions don't hesitate to ask us!

Cagatay Ulubay <cu@talesoft.io>
Torben Köhn <tk@talesoft.io>

URL: http://jade.talesoft.io