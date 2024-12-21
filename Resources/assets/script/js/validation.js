

function regex(checking){
    let namePattern = /^[a-zA-Z\s]+$/
    return namePattern.test(checking)
}

function regexN(checking){
    let NumberPattern = /^[0-9]{2,2}$/
    return NumberPattern.test(checking)
}

function regexImg(checking){
    if (checking.length != 0) {
        return(true)
    }
}