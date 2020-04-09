## 问题

json在传递过程中，会出现解密不了的情况。

```
$data = [
    'a' => '123',
    'source' => json_encode([
        'type' => "questionnaire-1",
        'info' => json_encode([
            'subTaskId' => '1',
            'name' => '中文名称',
        ]),
    ])
];
echo var_export(json_encode($data));

# 输出结果
{"a":"123","source":"{\\"type\\":\\"questionnaire-1\\",\\"info\\":\\"{\\\\\\"subTaskId\\\\\\":\\\\\\"1\\\\\\",\\\\\\"name\\\\\\":\\\\\\"\\\\\\\\u4e2d\\\\\\\\u6587\\\\\\\\u540d\\\\\\\\u79f0\\\\\\"}\\"}"}

echo json_decode('{"a":"123","source":"{\\"type\\":\\"questionnaire-1\\",\\"info\\":\\"{\\\\\\"subTaskId\\\\\\":\\\\\\"1\\\\\\",\\\\\\"name\\\\\\":\\\\\\"\\\\\\\\u4e2d\\\\\\\\u6587\\\\\\\\u540d\\\\\\\\u79f0\\\\\\"}\\"}"}'), 1);

输出NULL
```

## 方案

在参数处理时，采用serialize的方法

解密：unserialize