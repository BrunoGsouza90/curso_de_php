<style>

    @page{

        size: A4 landscape;
        font-size: 0.7em; 
        
    }

    table{

        margin: 0 auto;
        margin-top: 15px;
        border: 1px solid rgba(0, 0, 0, 0.5);
        border-collapse: collapse;

    }

    th, td{

        text-align: center;
        border: 1px solid rgba(0, 0, 0, 0.5);
        padding: 20px;

    }

</style>

<table>

    <thead>

        <tr>

            <th>#</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Login</th>
            <th>CPF/CNPJ</th>
            <th>Status</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Telefone</th>
            <th>Data de criação</th>
            <th>Cargo</th>

        </tr>

    </thead>

    <tbody>

        @foreach($users as $user)

            <tr>

                <td>{{ !empty($user->id) ? $user->id : '---' }}</td>
                <td>{{ !empty($user->name) ? $user->name : '---' }}</td>
                <td>{{ !empty($user->email) ? $user->email : '---' }}</td>
                <td>{{ !empty($user->login ) ? $user->login : '---' }}</td>
                <td>{{ !empty($user->document)? $user->document  : '---'}}</td>
                <td>{{ !empty($user->status)? $user->status : '---' }}</td>
                <td>{{ !empty($user->city) ? $user->city : '---' }}</td>
                <td>{{ !empty($user->state)? $user->state : '---' }}</td>
                <td>{{ !empty($user->telephone)? $user->telephone : '---' }}</td>
                <td>{{ !empty($user->created_at) ? $user->created_at : '---' }}</td>
                <td>{{ $user->is_admin == 'Sim' ? 'Administrador' : 'Usuário'}}</td>

            </tr>

        @endforeach

    </tbody>

</table>