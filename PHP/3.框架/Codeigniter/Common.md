

#### 记录有哪些类是已经被加载的
```
function &is_loaded($class = '')
{
    static $_is_loaded = array();

    if ($class !== '')
    {
        $_is_loaded[strtolower($class)] = $class;
    }

    return $_is_loaded;
}
```