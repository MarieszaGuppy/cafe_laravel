<x-dashbar>
    <x-slot:title>List Pengguna</x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc>Total {{ $userCount }} Pengguna</x-slot:desc>
    <x-slot:heading>
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="more-options"><em
                        class="icon ni ni-more-v"></em></a>
                <div class="toggle-expand-content" data-content="more-options">
                    <ul class="nk-block-tools g-3">
                        <form method="GET" action="{{ route('users.index') }}">
                            <li>
                                <div class="form-control-wrap">
                                    <div class="input-group">
                                        <input type="hidden" name="page" value="1">
                                        <input type="hidden" name="type" value="{{ request('type') }}">
                                        <!-- Menyimpan role di form -->
                                        <input type="search" name="search" class="form-control" id="default-04 search"
                                            placeholder="Cari dari nama" autocomplete="off"
                                            value="{{ request('search') }}">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-outline-primary btn-dim">Cari</button>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ri-search-line"></em>
                                    </div>
                                    <input type="search" name="search" class="form-control" id="default-04 search"
                                        placeholder="Cari dari nama" autocomplete="off">
                                </div> --}}
                            </li>
                        </form>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-outline-light btn-white"
                                    data-bs-toggle="dropdown">Role <i class="ri-arrow-down-s-line"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a
                                                href="{{ request()->fullUrlWithQuery(['type' => 'admin', 'page' => request('1')]) }}"><span>Admin</span></a>
                                        </li>
                                        <li><a
                                                href="{{ request()->fullUrlWithQuery(['type' => 'user', 'page' => request('1')]) }}"><span>User</span></a>
                                        </li>
                                        <li><a href="{{ route('users.index') }}"><span>Semua</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="nk-block-tools-opt">
                            <button class="btn btn-primary d-md-inline-flex" id="toggleTableButton"><em
                                    class="icon ri-add-large-line"></em><span>Tambah</span></button>
                        </li>
                        <li>
                            <button onclick="location.href='{{ route('admin.users.trash') }}'"
                                class="btn btn-outline-primary d-md-inline-flex" id="toggleTableButton"><em
                                    class="icon ri-delete-bin-line"></em></button>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- .nk-block-head-content -->
    </x-slot:heading>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($i = 1; $i <= $users->lastPage(); $i++)
                <li class="page-item {{ $users->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item">
                <a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="nk-block">
        <br>
        <div class="card card-bordered" id="createTable" style="display: none">
            <div class="card-inner">
                <div class="table-responsive">
                    <table class="table">
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <tr>
                                <td><input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" placeholder="Name" required />
                                    @error('name')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </td>
                                <td><input type="text" name="username" id="username"
                                        class="form-control @error('username') is-invalid @enderror"
                                        value="{{ old('username') }}" placeholder="Username" required />
                                    @error('name')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </td>
                                <td><input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" placeholder="Email" required />
                                    @error('email')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </td>
                                <td><input type="password" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Password" required />
                                    @error('password')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </td>
                                {{-- <td><input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            required />
                                        @error('password_confirmation')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </td> --}}
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="type1"
                                            value="1">
                                        <label class="form-check-label" for="type1">Admin</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="type2"
                                            value="0">
                                        <label class="form-check-label" for="type2">User</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button type="submit" class="btn btn-success">Tambah</button>
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                    </div>
                                </td>
                            </tr>
                        </form>
                    </table>
                </div>
            </div>
        </div>
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $index => $user)
                                <tr>
                                    {{-- <th scope="row">{{ $users->count() - $index }}</th> --}}
                                    <th scope="row">
                                        @php
                                            // Ambil inisial dari nama
                                            $initial = '';
                                            if (!empty($user->name)) {
                                                $nameParts = explode(' ', $user->name);
                                                foreach ($nameParts as $part) {
                                                    $initial .= strtoupper(substr($part, 0, 1));
                                                }
                                            }
                                        @endphp
                                        <div class="circle"
                                            style="background-color: {{ sprintf('#%06X', mt_rand(0, 0xffffff)) }};">
                                            {{ $initial }}
                                        </div>
                                    </th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ Str::limit($user->password, 10, '...') }}</td>
                                    <td>{{ $user->type }}</td>
                                    <td>
                                        <div class="btn-group" role="group"
                                            aria-label="Basic mixed styles example">
                                            <button type="button" class="btn btn-success"
                                                onclick="location.href='{{ route('users.show', $user->id) }}'">Lihat</button>
                                            <button class="btn btn-warning"
                                                onclick="location.href='{{ route('users.edit', $user->id) }}'">Edit</button>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <div class="no-data">
                                    <div class="alert alert-danger">
                                        Data Pengguna Belum Tersedia.
                                    </div>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        document.getElementById("toggleTableButton").addEventListener("click", function() {
            const table = document.getElementById("createTable");
            const buttonText = this.querySelector("span");
            const buttonIcon = this.querySelector("em"); // Select the icon

            // Toggle table visibility and button text/icon
            if (table.style.display === "none" || table.style.display === "") {
                table.style.display = "table"; // Show table
                buttonText.textContent = "Batalkan"; // Change button text to "Batalkan"
                buttonIcon.style.display = "none"; // Hide the icon
            } else {
                table.style.display = "none"; // Hide table
                buttonText.textContent = "Tambah Pengguna"; // Reset button text
                buttonIcon.style.display = "inline"; // Show the icon again
            }
        });
    </script>
    <style>
        .circle {
            width: 40px;
            /* Ukuran lingkaran */
            height: 40px;
            /* Ukuran lingkaran */
            border-radius: 50%;
            /* Membuat lingkaran */
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            /* Warna teks */
            font-weight: bold;
            /* Tebal untuk inisial */
            margin: auto;
            /* Centering lingkaran */
        }
    </style>
</x-dashbar>
