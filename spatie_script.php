use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

$roleAdmin = Role::findOrCreate('admin');
$roleDiscente = Role::findOrCreate('discente');
$roleSerc = Role::findOrCreate('serc');


$permissionViewCurso = Permission::findOrCreate('viewCurso');
$permissionCreateCurso = Permission::findOrCreate('createCurso');
$permissionUpdateCurso = Permission::findOrCreate('updateCurso');
$permissionDeleteCurso = Permission::findOrCreate('deleteCurso');

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
