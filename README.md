# xmissy_yii2
xmissy yii2

DIRECTORY STRUCTURE
-------------------

```
common                      公用
    config/                 contains shared configurations
    mail/                   contains view files for e-mails
    models/                 contains model classes used in both backend and frontend
    tests/                  contains tests for common classes 
strong                      自定义，重写
console                     命令行
    config/                 contains console configurations
    controllers/            contains console controllers (commands)
    migrations/             contains database migrations
    models/                 contains console-specific model classes
    runtime/                contains files generated during runtime
app_backend                 管理后台
    assets/                 contains application assets such as JavaScript and CSS
    config/                 contains backend configurations
    controllers/            contains Web controller classes
    models/                 contains backend-specific model classes
    runtime/                contains files generated during runtime
    tests/                  contains tests for backend application    
    views/                  contains view files for the Web application
    web/                    contains the entry script and Web resources
app_frontend                参考 app_backend
app_api                     接口
    config/                 contains frontend configurations
    controllers/            contains Web controller classes
    models/                 contains frontend-specific model classes
    runtime/                contains files generated during runtime
    tests/                  contains tests for frontend application
    web/                    contains the entry script and Web resources
vendor/                     contains dependent 3rd-party packages
environments/               contains environment-based overrides
```

## 参考
* [yii](https://www.yiichina.com/)
* [Yii 2.0 权威指南](https://www.yiichina.com/doc/guide/2.0)
* [yii2-app-advanced](https://github.com/yiisoft/yii2-app-advanced/blob/master/docs/guide-zh-CN/start-installation.md)
