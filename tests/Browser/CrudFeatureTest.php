<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Menu;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CrudFeatureTest extends DuskTestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        User::factory()->create([
            'email' => 'admin@lilycafe.test',
            'password' => bcrypt('password'),
        ]);
    }

    /** LOGIN MACRO */
    protected function login(Browser $browser)
    {
        $browser->visit('/login')
            ->type('#email', 'admin@lilycafe.test')
            ->type('#password', 'password')
            ->press('Log in')
            ->assertPathIs('/dashboard');
    }

    /** 1. LOGIN TEST */
    public function test_user_can_login_with_valid_credentials()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('#email', 'admin@lilycafe.test')
                ->type('#password', 'password')
                ->press('Log in')
                ->assertPathIs('/dashboard')
                ->assertSee('LILY CAFE');
        });
    }

    /** 2. CREATE MENU */
    public function test_user_can_create_menu()
    {
        $this->browse(function (Browser $browser) {
            $this->login($browser);

            $browser->visit('/menus/create')
                ->type('#name', 'Caramel Latte')
                ->type('#price', '25000')
                ->type('#description', 'Kopi caramel enak')
                ->press('Simpan')
                ->assertPathIs('/menus')
                ->assertSee('Data berhasil ditambahkan')
                ->assertSee('Caramel Latte');
        });
    }

    /** 3. READ MENU */
    public function test_created_menu_appears_in_menu_list()
    {
        $menu = Menu::create([
            'name' => 'Hazelnut',
            'price' => 20000,
            'description' => 'Hazelnut coffee',
        ]);

        $this->browse(function (Browser $browser) use ($menu) {
            $this->login($browser);

            $browser->visit('/menus')
                ->assertSee($menu->name)
                ->assertSee(number_format($menu->price));
        });
    }

    /** 4. UPDATE MENU */
    public function test_user_can_update_menu()
    {
        $menu = Menu::create([
            'name' => 'Mocha',
            'price' => 30000,
            'description' => 'Desc lama',
        ]);

        $this->browse(function (Browser $browser) use ($menu) {
            $this->login($browser);

            $browser->visit("/menus/{$menu->id}/edit")
                ->clear('#name')
                ->type('#name', 'Mocha Special')
                ->clear('#price')
                ->type('#price', '35000')
                ->clear('#description')
                ->type('#description', 'Mocha baru')
                ->press('Update')
                ->assertPathIs('/menus')
                ->assertSee('Data berhasil diperbarui')
                ->assertSee('Mocha Special')
                ->assertDontSee('Desc lama');
        });
    }

    /** 5. DELETE MENU */
    public function test_user_can_delete_menu()
    {
        $menu = Menu::create([
            'name' => 'Menu Hapus',
            'price' => 22000,
            'description' => 'to delete',
        ]);

        $this->browse(function (Browser $browser) use ($menu) {
            $this->login($browser);

            $browser->visit('/menus')
                ->assertSee('Menu Hapus')
                ->press('Hapus')
                ->assertSee('Data berhasil dihapus')
                ->assertDontSee('Menu Hapus');
        });
    }
}
