const data = JSON.parse(localStorage.getItem('items',links));
    console.log(data)//mere damchirdeba


    
   $('#btn1').on('click', function (e) {
    e.stopPropagation();
    e.preventDefault();
        $('#tableURLs').append(`
        
        <thead>
        <tr>
          <th scope="col" width="5%">#</th>
          <th scope="col" width="30%">URL</th>
          <th scope="col" width="15%">Tag</th>
          <th scope="col" width="50%">Description</th>
        </tr>
      </thead>
        `);
   });