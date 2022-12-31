<?php
class Author extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('author');
    }
    public function index()
    {
        $data = $this->author->all();
        $this->load->name = 'Rajesh';
        $this->load->view('author.index', compact('data'));
    }
    public function create()
    {
        // echo "this is create controller";
        $this->load->view("author.create");
    }
    public function store()
    {
        $info = [
            'username' => request('username'),
            'password' => request('password'),
            'fullname' => request('fullname'),
            'mobile' => request('mobile'),
            'email' => request('email'),
            'gender' => request('gender'),
        ];
        $this->author->insert($info);
    }
    public function edit($id)
    {
        $id = decode_url($id);
        $info = $this->author->find($id);
        // print_r($info);
    }
    public function checkeduser()
    {
        $name = request('name');
        echo ($this->author->is_author($name)) ? "<span class='text-danger' id='na'> &#x2715 $name</span> username not available for you !" : "<span class='text-success'> &#10003;	 $name</span> username  available for you !";
    }
}
