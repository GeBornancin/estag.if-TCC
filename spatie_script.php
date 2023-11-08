use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

$roleAdmin = Role::findOrCreate('admin');

$roleSerc = Role::findOrCreate('serc');


$permissionViewCurso = Permission::findOrCreate('viewCurso');
$permissionCreateCurso = Permission::findOrCreate('createCurso');
$permissionUpdateCurso = Permission::findOrCreate('updateCurso');
$permissionDeleteCurso = Permission::findOrCreate('deleteCurso');
<<<<<<< HEAD

$permissionViewCurso->assignRole($roleAdmin);
$permissionCreateCurso->assignRole($roleAdmin);
$permissionUpdateCurso->assignRole($roleAdmin);
$permissionDeleteCurso->assignRole($roleAdmin);

$permissionViewEmpresa = Permission::findOrCreate('viewEmpresa');
$permissionCreateEmpresa = Permission::findOrCreate('createEmpresa');
$permissionUpdateEmpresa = Permission::findOrCreate('updateEmpresa');
$permissionDeleteEmpresa = Permission::findOrCreate('deleteEmpresa');

$permissionViewEmpresa->assignRole($roleAdmin);
$permissionCreateEmpresa->assignRole($roleAdmin);
$permissionUpdateEmpresa->assignRole($roleAdmin);
$permissionDeleteEmpresa->assignRole($roleAdmin);


$user = User::find(1);
$user->assignRole('admin');

$user = User::find(2);
$user->assignRole('serc');




=======

$permissionViewCurso->assignRole($roleAdmin);
$permissionCreateCurso->assignRole($roleAdmin);
$permissionUpdateCurso->assignRole($roleAdmin);
$permissionDeleteCurso->assignRole($roleAdmin);

$permissionViewCurso->assignRole($roleAdmin);
$permissionCreateCurso->assignRole($roleAdmin);
$permissionUpdateCurso->assignRole($roleAdmin);


if ($user->tipoUsuario == 'discente') {
    $user->assignRole('discente');
}else if ($user->tipoUsuario == 'serc') {
    $user->assignRole('serc');
}else if ($user->tipoUsuario == 'admin') {
    $user->assignRole('admin');
}
>>>>>>> 75697dd7a8bea343fba3233ad01e61981ebaa017
