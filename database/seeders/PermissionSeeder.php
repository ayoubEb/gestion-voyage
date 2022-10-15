<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=[
          "role-list","role-create","role-edit","role-show","role-destroy",
          "user-list","user-create","user-edit","user-show","user-destroy",
          "chauffeur-list","chauffeur-create","chauffeur-edit","chauffeur-show","chauffeur-destroy",
          "voyageSuggere-list","voyageSuggere-create","voyageSuggere-edit","voyageSuggere-show","voyageSuggere-destroy",
          "agence-list","agence-create","agence-edit","agence-show","agence-destroy",
          "agenceUser-list","agenceUser-create","agenceUser-edit","agenceUser-show","agenceUser-destroy",
          "reservation-list","reservation-create","reservation-edit","reservation-show","reservation-destroy",

        ];
        foreach($permissions as $permission){
          Permission::create(["name"=>$permission]);
      }
    }
}
