(
    (d, c) => {
        c("Connected");
        initNav();
        initSelect();
        initTabs();
        initModal();
        showPokedexCards();
        showPokedexTable();
        getPokedexFilterValues();
    })(document, console.log);

function initNav() {
    var el = document.querySelector('.dropdown-trigger');
    var instance = M.Dropdown.init(el);
}

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
        request = getXHRType();

    if (showCards) {
        showCards.addEventListener('click', e => {
            e.preventDefault();
            request.open('GET', 'pokedex/search-cards.php');
            request.addEventListener('readystatechange', e => {
                if (request.readyState === 4) {
                    showResult.innerHTML = request.response;
                }
            });
            request.send();
        });
    }
}

function showPokedexTable() {
    let showTable = document.getElementById('show-table'),
        showResult = document.getElementById('show-result'),
        request = getXHRType();

    if (showTable) {
        showTable.addEventListener('click', e => {
            e.preventDefault();
            request.open('GET', 'pokedex/search-table.php');
            request.addEventListener('readystatechange', e => {
                if (request.readyState === 4) {
                    showResult.innerHTML = request.response;
                }
            });
            request.send();
        });
    }
}

function getPokedexFilterValues() {
    let filterType= document.getElementById('pokedex-filterType'),
        filterValue= document.getElementById('pokedex-filterValue'),
        res;

    if (filterType) {
        filterType.addEventListener('change', e => {
          request= getXHRType();
          filterValue.options.length=0;
          switch (e.target.value) {
            case 'typing':
              request.open('GET', 'src/controllers/TypingController.php?q=1');
              request.addEventListener('readystatechange', e => {
                  if (request.readyState === 4) {
                    res=JSON.parse(request.response);
                    res.data.forEach(e=>{
                      let newOption = document.createElement("option");
                      newOption.value = e.typing_id;
                      newOption.innerHTML = e.name;
                      filterValue.options.add(newOption);
                    });
                    M.FormSelect.init(filterValue);
                  }
              });
              break;
            case 'ability':
              request.open('GET', 'src/controllers/AbilityController.php?q=1');
              request.addEventListener('readystatechange', e => {
                  if (request.readyState === 4) {
                    res=JSON.parse(request.response);
                    res.data.forEach(e=>{
                      let newOption = document.createElement("option");
                      newOption.value = e.Ability_id;
                      newOption.innerHTML = e.name;
                      filterValue.options.add(newOption);
                    });
                    M.FormSelect.init(filterValue);
                  }
              });
              break;
          }
          request.send();
        });
    }
}

function getXHRType() {
    let request;
    if (window.XMLHttpRequest) {
        request = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        request = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return request;
}
