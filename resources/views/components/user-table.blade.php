<div class="table-scroll">
    <table class="user-table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">NPM</th>
                <th scope="col">Kelas</th>
                <th scope="col"><a href="{{ route('users.create') }}">Tambah</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->nim }}</td>
                    <td>{{ $user->nama_kelas }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Hapus pengguna ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>