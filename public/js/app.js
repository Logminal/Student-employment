let date = document.querySelector('div.date p')
const now = new Date()
let nowDay
let nowMou

if (now.getDate() < 10) {
    nowDay = `0${now.getDate()}`
} else {
    nowDay = now.getDate()
}

if (now.getMonth() < 10) {
    nowMou = `0${now.getMonth() + 1}`
} else {
    nowMou = now.getMonth()
}

date.innerHTML = nowDay + '.' + nowMou + '.' + now.getFullYear()

let tabs = document.querySelectorAll('.tabs>p')
let tabsItem = document.querySelectorAll('tr.enterpr')

tabs.forEach(function (item) {
    item.addEventListener('click', () => {
        let currentBtn = item
        let tabId = currentBtn.getAttribute('data-tab')
        let currentTab = document.querySelectorAll(tabId)
        console.log(currentTab);
        tabs.forEach(function (item) {
            item.classList.remove('active')
        })

        tabsItem.forEach(function (item) {
            item.classList.remove('active')
        })

        currentBtn.classList.add('active')

        currentTab.forEach(element => {
            element.classList.add('active')
        });

        console.log(tabId);
        if (tabId == '#tab3') {
            tabsItem.forEach(element => {
                element.classList.add('active')
            });
        }

    })
})

