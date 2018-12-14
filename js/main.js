
var Links = [
    1 = {
        url: 'ddd',
        tag: 'sss',
        desc: '000'
    }
];
Links.push()

    
    $('#shareUrl').on('click', function (e) {
         
        $('#finish').html(`
            <div class="jumbotron">
                
                    <a href="result.html" target="_blank" class="display-4" id="text">https://www.testetest.com/1254125&yoururl</a>
                
            </div>
        
        `);
        

    });

    const data = JSON.parse(localStorage.getItem('items'));
    console.log(data)//mere damchirdeba

    
   $('#btn1').on('click', function (e) {
    e.stopPropagation();
    e.preventDefault();
        $('#finalresult').append(`
        <div class="card">
        <div class="card-header">
          Featured
        </div>
        <div class="card-body">
          <h5 class="card-title"></h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-success">Go somewhere</a>
        </div>
      </div>
        `);
   });