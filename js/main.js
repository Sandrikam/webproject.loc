const data1 = JSON.parse(localStorage.getItem('items'));
  
  $(document).ready(function() {
    $('#TableURLs thead').append(`
    <tr>
      <th scope="col" width="5%">#</th>
      <th scope="col" width="30%" class="url">URL</th>
      <th scope="col" width="15% class="tag">Tag</th>
      <th scope="col" width="50%" class="Descr">Description</th>
    </tr>
    `);

    console.log($('#TableURLs .url').text(data1[0]['url']));
    Console.log($('#TableURLs .tag').text(data1[0]['tag']));
    console.log($('#TableURLs .Descr').text(data1[0]['Descr']));
   console.log(data1);
  
  });