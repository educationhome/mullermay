// Get Attribute Safe 

function getAttributeSafe(element, attr) {
    return element && element.getAttribute(attr) ? element.getAttribute(attr) : "";
}

export { getAttributeSafe };