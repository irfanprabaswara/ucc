<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
  <table>
    <thead>
      <tr>
        @if(@isset($questions))
          <th>#</th>
          <th>Name</th>
          <th>Potition</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Company</th>
          <th>Company's Email</th>
          <th>Company's Phone</th>
        @endif
        @foreach($questions as $question)      
          <th>{{$question->pertanyaan}}</th>        
        @endforeach
      </tr>
    </thead>
    <tbody>
      @forelse($responses as $response)
        <tr>
          <td>{{$loop->index + 1}}</td>
          <td>{{$response->informan->nama}}</td>
          <td>{{$response->informan->jabatan}}</td>
          <td>{{$response->informan->email}}</td>
          <td>{{$response->informan->telpon}}</td>
          <td>{{$response->informan->perusahaan}}</td>
          <td>{{$response->informan->email_perusahaan}}</td>
          <td>{{$response->informan->telpon_perusahaan}}</td>
          @foreach($response->respon_list as $response_list)          
            @if(@isset($response_list->jawaban_bebas))
              <td>{{$response_list->jawaban_bebas}}</td>
            @else
              <td>{{$response_list->opsi_list->nama_list}}</td>            
            @endif
          @endforeach
        </tr>
      @empty
      @endforelse
      @if(@isset($responses))
        <tr></tr>
        <tr>
          <td>Total Responses</td>
          <td>{{$responses_count}}</td>
        </tr>
      @endif
    </tbody>
  </table>
</body>
</html>