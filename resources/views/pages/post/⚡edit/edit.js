
new TomSelect(this.$refs.tags, {
    valueField: 'id',
    labelField: 'name',
    searchField: 'name',
    load: (query, callback) => {
        this.getTags(query)
        .then(tags => {
            callback(tags)
        }).catch(() => {
            callback()
        })
    },
})

// gateway between tempalte and script - This creates popup to delete a post
this.$js.deletePost = () => {
    if (confirm('Are you sure you want to delete this post?')) {
        this.delete()
    }
}

this.$js.showUpdateSuccess = () => {
    alert('Post successfully updated!');
}


// creating browser notification pop-up when user clears unsaved text
// Dirty State: any data existing in UI that not sent to backend yet
window.addEventListener('beforeunload', e => {

    if (this.$dirty('content')) {
        e.preventDefault()
    }
})

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
