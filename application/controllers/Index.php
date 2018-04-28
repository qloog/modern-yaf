<?php
/**
 * @name IndexController
 * @author qloog
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class IndexController extends Yaf\Controller_Abstract 
{


    public function dbAction()
    {
        //$user = UserModel::find(1);
        //
        //$user->name = 'user1 name';
        //$user->save();

        //$ret = UserModel::create(['name' => 'user4', 'email' => 'user4@email.com', 'password' =>  123456]);
        //
        //var_dump($ret);

        $user2 = DB::table('users')->find(2);

        var_dump($user2->email);
    }
}
