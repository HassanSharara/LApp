
<?php
class RoyalSettings {

    static $imagesUploadPath = "uploads/files/images/";
    
    static function AllRoles():array {
        return [
            
            new AdminRole("all_admin","التحكم المطلق"),
            new AdminRole("notifications","التعامل مع الاشعارات"),
            new AdminRole("roles","ادارة ادمنية النظام"),
            new AdminRole("banners","التحكم بنظام البانرات"),
            new AdminRole("categories","التحكم بنظام التقسيمات الرئيسية للموظفين"),
        ];
    }
}

class AdminRole {
    public string $id;
    public string $description;
    public function __construct(string $id,string $description) {
        $this->id = $id;
        $this->description = $description;
    }


     static function new(string $id,string $des){
        return new AdminRole($id,$des);
    }
}