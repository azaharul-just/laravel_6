<!DOCTPE html>
<html>
<head>
<title>View Student Records</title>
</head>
<body>
<table border = "1">
<tr>
<td>ID</td>
<td>Category Name</td>
<td>Category Slug</td>
<td>Category Created</td>
<td>Action</td>
</tr>
@foreach ($users as $user)
<tr>
<td>{{ $user->id }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->slug }}</td>
<td>{{ $user->created_at }}</td>
 
<td><a href = 'delete/{{ $user->id }}'>Delete</a></td>
</tr>
@endforeach
</table>
</body>
</html>