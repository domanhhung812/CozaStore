
    <thead>
        <tr>	
            <th>#</th>
            <th>Tên người dùng</th>
            <th>Email</th>
            <th>Tên blog</th>
            <th>Nội dung</th>
            <th>Thời gian đánh giá</th>
            <th colspan="2" width="3%" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $item)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $item->co_name }}</td>
            <td>{{ $item->co_email }}</td>
            <td>{{ $item->b_name }}</td>
            <td>{{ $item->co_content }}</td>
            <td>{{ $item->created_at }}</td>
            <td>
                <button class="btn btn-danger delete-feedback" id="{{$item->id}}">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>