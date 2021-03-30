const deleteCheckbox = Array.from(document.querySelectorAll('.delete-checkbox'))
const boolValue = Array.from(document.querySelectorAll('.bool-value'))
// deleteCheckbox.addEventListener('click', () =>
// {
//     const urlStatus = parseInt(deleteCheckbox.getAttribute('value'))
//     console.log(urlStatus)
//     if(urlStatus === 1)deleteCheckbox.setAttribute('value', 0)
//     if(urlStatus === 0)deleteCheckbox.setAttribute('value', 1)
    
// })

deleteCheckbox.forEach((checkbox, index)=> {
    checkbox.addEventListener('click', () =>
    {
        const urlStatus = parseInt(boolValue[index].getAttribute('value'))
        console.log(urlStatus)
        if(urlStatus === 1)boolValue[index].setAttribute('value', 0)
        if(urlStatus === 0)boolValue[index].setAttribute('value', 1)
        
    })
});


const burgerMenu = document.querySelector('.burger-menu')
const linksContainer = document.querySelector('.links-container')



burgerMenu.addEventListener('click', () =>
{
    linksContainer.classList.toggle('opened-menu')
    burgerMenu.classList.toggle('cross-menu')
})