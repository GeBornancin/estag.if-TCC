
/** Script para ativar o funcionamento basico do SPATIE no Laravel
*/
/** Permitindo acesso aos metodos das classes Role e Permission
*/
use App\Models\User;
use App\Models\Discente;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
/**
Exemplo de comando utilizado para criar um papel
$roleAdmin = Role::create(['name' => 'admin']);
Aqui e utilizado o metodo findOrCreate para encontrar ou criar um papel
*/
$roleAdmin = Role::findOrCreate('admin');
$roleDiscente = Role::findOrCreate('discente');
$roleSerc = Role::findOrCreate('serc');
$roleVisitante = Role::findOrCreate('visitante');


$permissionViewVaga = Permission::findOrCreate('viewVaga');
$permissionCreateVaga = Permission::findOrCreate('createVaga');
$permissionUpdateVaga = Permission::findOrCreate('updateVaga');
$permissionDeleteVaga = Permission::findOrCreate('deleteVaga');
/**
O metodo assignRole e utilizado para atribuir um papel a uma permissao
*/
$permissionViewVaga->assignRole($roleAdmin);
$permissionCreateVaga->assignRole($roleAdmin);
$permissionUpdateVaga->assignRole($roleAdmin);
$permissionDeleteVaga->assignRole($roleAdmin);

/**
Buscamos o usuario com ID igual a 1 e atribuimos o papel de admin a ele
*/
$user = User::find(1);
$user->assignRole('admin');
/**
Buscamos o usuario com ID igual a 2 e atribuimos o papel de Discente a ele
*/
$user = User::find(2);
$user->assignRole('Discente');