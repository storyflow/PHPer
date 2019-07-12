


## Controller 
#### 核心方法：
CI_Controller




#### 一般会预留一个自定义方法
``
class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
}
```