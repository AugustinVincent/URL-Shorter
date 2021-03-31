const deleteCheckbox = Array.from(document.querySelectorAll('.delete-checkbox'))
const boolValue = Array.from(document.querySelectorAll('.bool-value'))


// Set the url Status value on true or false on url manager
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


// Toggle the menu state on responsive
burgerMenu.addEventListener('click', () =>
{
    linksContainer.classList.toggle('opened-menu')
    burgerMenu.classList.toggle('cross-menu')
})

// Make the user able to copy the shorted link just by clicking it
function copyToClipboard(target) {
    var copyTextTarget = document.querySelector(target);
    copyTextTarget.select();
    copyTextTarget.setSelectionRange(0, 99999);
    document.execCommand("copy");
  }