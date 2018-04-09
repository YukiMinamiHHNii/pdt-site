(
  (d, c) => {
    c("Connected");
    initSelect();
    initTabs();
    initModal();
    showPokedexCards();
    showPokedexTable();
  }
)(document, console.log);

function initSelect() {
  var el = document.querySelectorAll('select');
  var instance = M.FormSelect.init(el);
}

function initTabs() {
  var el = document.querySelectorAll('.tabs');
  var instance = M.Tabs.init(el);
}

function initModal() {
  var el = document.querySelector('.modal');
  var instance = M.Modal.init(el);
}

function showPokedexCards() {
  let showCards = document.getElementById('show-cards'),
      showResult = document.getElementById('show-result'),
      request= getXHRType();

  showCards.addEventListener('click', e => {
    e.preventDefault();
    request.open('GET', '../../components/pokedex/search-cards.php');

    request.addEventListener('readystatechange', e => {
      // console.log(request);
      if (request.readyState === 4) {
        showResult.innerHTML = request.response;
      }
    });

    request.send();
    // console.log('Showing cards ;v');
  });
}

function showPokedexTable() {
  let showTable = document.getElementById('show-table'),
      showResult = document.getElementById('show-result'),
      request= getXHRType();

  showTable.addEventListener('click', e => {
    e.preventDefault();
    request.open('GET', 'http://localhost:85/webapp/components/pokedex/search-table.php');

    request.addEventListener('readystatechange', e => {
      // console.log(request);
      if (request.readyState === 4) {
        showResult.innerHTML = request.response;
      }
    });

    request.send();
    // console.log('Showing table ;v');
  });
}

function getXHRType(){
  let request;
  if (window.XMLHttpRequest) {
    request = new XMLHttpRequest();
  } else if (window.ActiveXObject) {
    request = new ActiveXObject("Microsoft.XMLHTTP");
  }
  return request;
}
