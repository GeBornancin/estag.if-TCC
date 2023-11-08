use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

$roleAdmin = Role::findOrCreate('admin');

$roleSerc = Role::findOrCreate('serc');


$permissionViewCurso = Permission::findOrCreate('viewCurso');
$permissionCreateCurso = Permission::findOrCreate('createCurso');
$permissionUpdateCurso = Permission::findOrCreate('updateCurso');
$permissionDeleteCurso = Permission::findOrCreate('deleteCurso');

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


$permissionViewVaga = Permission::findOrCreate('viewVaga');
$permissionCreateVaga = Permission::findOrCreate('createVaga');
$permissionUpdateVaga = Permission::findOrCreate('updateVaga');
$permissionDeleteVaga = Permission::findOrCreate('deleteVaga');

$permissionViewVaga->assignRole($roleAdmin);
$permissionCreateVaga->assignRole($roleAdmin);
$permissionUpdateVaga->assignRole($roleAdmin);
$permissionDeleteVaga->assignRole($roleAdmin);

$user = User::find(1);
$user->assignRole('admin');

$user = User::find(2);
$user->assignRole('serc');




