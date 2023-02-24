export function locationPathName() {
    return window.location.origin + window.location.pathname
}

export function getUrlWithSerializedForm($form) {
    let permalink = locationPathName();
    let url =  new URL(permalink + '?' + $form.serialize());
    let params = new URLSearchParams(url.search);
    let searchParams = new URLSearchParams(url.search);

    // Remove parameters you don't want to show in url
    // like this params.delete('action');
    params.delete('action');
    params.delete('archived');
    params.delete('my-page');
    params.delete('is-load-more');

    searchParams.forEach((value, key) => {
        if( value.length === 0 ) {
            params.delete(key);
        }
    });

    let paramsString = params.toString();

    return ( paramsString ) ? '?' + paramsString : permalink;
}