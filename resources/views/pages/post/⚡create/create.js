let textarea = $wire.$refs.content

autoSizeTextarea(textarea)

textarea.addEventListener('input', () => autoSizeTextarea(textarea))

function autoSizeTextarea(el) {
    let style = window.getComputedStyle(el)
    let borderTop = parseFloat(style.borderTopWidth) || 0
    let borderBottom = parseFloat(style.borderBottomWidth) || 0

    el.style.height = 'auto'
    el.style.height = (el.scrollHeight + borderTop + borderBottom) + 'px'
}
