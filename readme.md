## About Multiple Authentication

Multiple authentication with laravel > 5.5

![Multiple Auth](https://simonsayszero.files.wordpress.com/2018/05/a5_1.png)


## Create Laravel Multiple Authentication

(```Indonesian mode ON```)

Ok, ternyata cukup mudah untuk membuat multiple aut di laravel, dan ini baru saja saya sadari ternyata 😅. Ada beberapa point yang perlu diperhatikan dalam membuat multiple auth ini. Namun intinya terletak pada modelnya ( disini saya pakai eloquent model bawaan laravel ) dan konfigurasi pada ```auth.php``` yang terletak pada folder config.

### 1. Migrations

Disini saya menggunakan 2 tabel yaitu tabel users (bawaan dari laravel) dan mahasiswa. Anda bisa lihat [disini](database/migrations). Untuk pembuatan tabel sama seperti biasa.

### 2. Eloquent Model

Nah bagian disini, ada beberapa hal yang perlu diperhatikan. Pertama anda bisa menggunakan perintah biasa untuk membuat model. Disini saya membuat model ```mahasiswa```,

```
    php artisan make:model mahasiswa
```

Lalu pastikan anda untuk menggunakan class notifiable dan user dengan menambahkan

```
  use Illuminate\Notifications\Notifiable;
  use Illuminate\Foundation\Auth\User as Authenticatable;
```

Jangan lupa untuk extends anda harus mengganti model dengan ```Authenticatable```. Dan class tersebut tambahkan ```use Notifiable;```. Anda bisa lihat [disini](app/Mahasiswa.php)

### 3. Konfigurasi ```auth.php```

Untuk auth, anda perlu menambahkan ```guards``` dan ```providers```. Pertama buka bagian ```config/auth.php```, lalu tambahkan pada bagian providers seperti dibawah

```
  '[nama_provider]' => [
      'driver' => 'eloquent',
      'model' => App\[nama_model_eloquent]::class,
  ],
```

Lalu untuk guards, tambah seperti berikut

```
  '[nama_guard]' => [
      'driver' => 'session',
      'provider' => '[nama_provider]',
  ],
```

```[nama_provider]``` yang ada di guards sesuaikan dengan ```[nama_provider]``` yang sudah anda dibagian bawah. Untuk guards disini akan dipanggil dengan Auth::```[nama_guards]```. Anda bisa lihat settingan ```auth.php``` saya [disini](config/auth.php)


### 4. Controller

Dibagian controller, jangan lupa tambahkankan ```use Illuminate\Support\Facades\Auth;```. Untuk penggunakan bisa gunakan Auth::guard('```[nama_guard]```'), ```[nama_guard]``` adalah nama yang sudah diset di ```auth.php```. Lalu untuk fungsi setelahnya bisa gunakan ```->[nama_fungsi]```. Contoh untuk cek user saat init bisa gunakan ```Auth::[nama_guard]->[nama_fungsi]```. Contoh penggunaan [disini](app/Http/Controllers/MahasiswaController.php)

#### CheatSheet

| Auth          | Desc           |
| ------------- |:-------------:|
| Auth::check();      | Determine if the current user is authenticated |
| Auth::user();      | Get the currently authenticated user      |
| Auth::id(); | Get the ID of the currently authenticated user      |
| Auth::attempt(array('email' => $email, 'password' => $password)); | Get the ID of the currently authenticated user      |
| Auth::attempt($credentials, true); | 'Remember me' by passing true to Auth::attempt()      |
| Auth::login(User::find(1)); | Log a user into the application |
| Auth::loginUsingId(1); | Log the given user ID into the application  |
| Auth::logout(); | Log the user out of the application   |
| Auth::validate($credentials); | Validate a user's credentials      |

## Summary

Cukup mudah untuk membuat multiple auth pada laravel, ada beberapa poin yang perlu diperhatikan adalah **eloquent model** dan ```auth.php```

## Source
- [Laravel CheatSheet](https://laravel.gen.tr/cheatsheet/)
