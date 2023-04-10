// База данных
let listData = [{
        name: 'Антон',
        surename: 'Андреевич',
        lastname: 'Шеманков',
        age: 19,
        group: 'УВП-211'
    },
    {
        name: 'Даниил',
        surename: 'Владисдавович',
        lastname: 'Гусляков',
        age: 19,
        group: 'УВП-213'
    },
    {
        name: 'Даниил',
        surename: 'Дмитриевич',
        lastname: 'Климчук',
        age: 19,
        group: 'УВП-213'
    },
    {
        name: 'Юлия',
        surename: 'Олеговна',
        lastname: 'Антонова',
        age: 21,
        group: 'УИБ-211'
    },
    {
        name: 'Александр',
        surename: 'Иванович',
        lastname: 'Воронин',
        age: 19,
        group: 'УИБ-211'
    },
]

let sortColumnFlag = 'fio',
    sortDirFlag = true

// Создание элементов
const $app = document.getElementById('app'),
    $addForm = document.getElementById('add-form'),
    $nameInp = document.getElementById('add-form__name-inp'),
    $surenameInp = document.getElementById('add-form__surename-inp'),
    $lastnameInp = document.getElementById('add-form__lastname-inp'),
    $ageInp = document.getElementById('add-form__age-inp'),
    $groupInp = document.getElementById('add-form__group-inp'),
    $sortFIOBtn = document.getElementById('sort__fio'),
    $sortAgeBtn = document.getElementById('sort__age'),

    $filterForm = document.getElementById('filter-form'),
    $fioFilterInp = document.getElementById('filter-form__fio-inp'),
    $groupFilterInp = document.getElementById('filter-form__group-inp'),

    $table = document.createElement('table'),
    $tableHead = document.createElement('thead'),
    $tableBody = document.createElement('tbody'),

    $tableHeadTr = document.createElement('tr'),
    $tableHeadThFIO = document.createElement('th'),
    $tableHeadThAge = document.createElement('th'),
    $tableHeadThBirthYear = document.createElement('th'),
    $tableHeadThGroup = document.createElement('th');

$table.classList.add('table', 'table-light')

$tableHeadThFIO.textContent = 'ФИО'
$tableHeadThAge.textContent = 'Возраст'
$tableHeadThBirthYear.textContent = 'Год рождения'
$tableHeadThGroup.textContent = 'Группа'

$tableHeadTr.append($tableHeadThFIO)
$tableHeadTr.append($tableHeadThAge)
$tableHeadTr.append($tableHeadThBirthYear)
$tableHeadTr.append($tableHeadThGroup)

$tableHead.append($tableHeadTr)
$table.append($tableHead)
$table.append($tableBody)
$app.append($table)

// Создание Tr одного пользователя
function createUserTr(oneUser) {
    const $userTr = document.createElement('tr'),
        $userFIO = document.createElement('th'),
        $userAge = document.createElement('th'),
        $userBirthYear = document.createElement('th'),
        $userGroup = document.createElement('th');

    $userFIO.textContent = oneUser.fio
    $userAge.textContent = oneUser.age
    $userBirthYear.textContent = oneUser.birthYear
    $userGroup.textContent = oneUser.group

    $userTr.append($userFIO)
    $userTr.append($userAge)
    $userTr.append($userBirthYear)
    $userTr.append($userGroup)

    return $userTr
}

// Фильтрация 
function filter(arr, prop, value) {
    return arr.filter(function(oneUser) {
        if (oneUser[prop].includes(value.trim())) return true
    });
}

// Рендер
function render(arrData) {
    $tableBody.innerHTML = '';
    let copyListData = [...arrData]

    // Подготовка
    for (const oneUser of copyListData) {
        oneUser.fio = oneUser.name + ' ' + oneUser.surename + ' ' + oneUser.lastname
        oneUser.birthYear = 2022 - oneUser.age
    }

    // Сортировка
    copyListData = copyListData.sort(function(a, b) {
        let sort = a[sortColumnFlag] < b[sortColumnFlag]
        if (sortDirFlag == false) sort = a[sortColumnFlag] > b[sortColumnFlag]
        if (sort) return -1
    })

    // Фильтрация
    if ($fioFilterInp.value.trim() !== "") {
        copyListData = filter(copyListData, 'fio', $fioFilterInp.value)
    }

    if ($groupFilterInp.value.trim() !== "") {
        copyListData = filter(copyListData, 'group', $groupFilterInp.value)
    }

    // Отрисовка
    for (const oneUser of copyListData) {
        const $newTr = createUserTr(oneUser)
        $tableBody.append($newTr)
    }
}

render(listData)

// Добавление
$addForm.addEventListener('submit', function(event) {
    event.preventDefault()

    // Валидация
    if ($nameInp.value.trim() == "") {
        alert('Имя не введено!')
        return
    }

    if ($surenameInp.value.trim() == "") {
        alert('Отчество не введено!')
        return
    }

    if ($lastnameInp.value.trim() == "") {
        alert('Фамилия не введена!')
        return
    }

    if ($ageInp.value.trim() == "") {
        alert('Возраст не введен!')
        return
    }
    if ($groupInp.value.trim() == "") {
        alert('Группа не введена!')
        return
    }

    listData.push({
        name: $nameInp.value.trim(),
        surename: $surenameInp.value.trim(),
        lastname: $lastnameInp.value.trim(),
        age: parseInt($ageInp.value.trim()),
        group: $groupInp.value.trim()
    })

    render(listData)
})

// Клики сортировки
$sortFIOBtn.addEventListener('click', function() {
    sortColumnFlag = 'fio'
    sortDirFlag = !sortDirFlag
    render(listData)
})

$sortAgeBtn.addEventListener('click', function() {
    sortColumnFlag = 'age'
    sortDirFlag = !sortDirFlag
    render(listData)
})

// Фильтр
$filterForm.addEventListener('submit', function(event) {
    event.preventDefault()
})

$fioFilterInp.addEventListener('input', function() {
    render(listData)
})
$groupFilterInp.addEventListener('input', function() {
    render(listData)
})