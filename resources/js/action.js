(
    (d, c) => {
        c("Connected");
        initNav();
        initSelect();
        initTabs();
        initModal();
        showPokedexCards();
        showPokedexTable();
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

function getXHRType() {
    let request;
    if (window.XMLHttpRequest) {
        request = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        request = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return request;
}