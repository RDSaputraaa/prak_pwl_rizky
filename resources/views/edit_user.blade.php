@extends('layout.app')

@section('title', 'Edit Pengguna')

@section('content')
    <form class="user-form" action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nama">
            Nama
            <input type="text" id="nama" name="nama" value="{{ old('nama', $user->name) }}" required>
            @error('nama') <span class="field-error">{{ $message }}</span> @enderror
        </label>

        <label for="npm">
            NPM
            <input type="text" id="npm" name="npm" value="{{ old('npm', $user->nim) }}" required>
            @error('npm') <span class="field-error">{{ $message }}</span> @enderror
        </label>

        <label for="kelas_id">
            Kelas
            <select id="kelas_id" name="kelas_id" required>
                <option value="">Pilih kelas</option>
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}" @selected(old('kelas_id', $user->kelas_id) == $kelasItem->id)>
                        {{ $kelasItem->nama_kelas }}
                    </option>
                @endforeach
            </select>
            @error('kelas_id') <span class="field-error">{{ $message }}</span> @enderror
        </label>

        <button type="submit">Update</button>
        <a href="{{ route('users.index') }}">Kembali</a>
    </form>
@endsection
