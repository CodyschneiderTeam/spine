module.exports = {
    mode     : 'jit',
    content  : [
        './public/docs/*.md',
        './app/Enums/**/*.php',
        './app/Requests/**/*.php',
        './spa/**/*.{css,js,vue,php}',
        './vendor/caneara/spine/resources/**/*.{css,js,vue,php}',
    ],
    darkMode : 'class',
    theme    : {
        spacing : Object.assign({},
            { 'auto' : 'auto', 'full' : '100%', 'screen-w' : '100vw', 'screen-h' : '100vh', '0' : '0' },
            { '1/2' : '50%', '1/3' : '33.333333%', '2/3' : '66.666667%' },
            { '1/4' : '25%', '2/4' : '50%', '3/4' : '75%' },
            { '1/5' : '20%', '2/5' : '40%', '3/5' : '60%', '4/5' : '80%' },
            { '1/6' : '16.666667%', '2/6' : '33.333333%', '3/6' : '50%', '4/6' : '66.666667%', '5/6' : '83.333333%' },
            { '1/10' : '10%', '3/10' : '30%', '7/10' : '70%' },
            { '1/12' : '8.333333%', '2/12' : '16.666667%', '3/12' : '25%', '4/12' : '33.333333%', '5/12' : '41.666667%', '6/12' : '50%', '7/12' : '58.333333%', '8/12' : '66.666667%', '9/12' : '75%', '10/12' : '83.333333%', '11/12' : '91.666667%' },
            { '1/20' : '5%', '7/20' : '35%', '9/20' : '45%', '11/20' : '55%', '17/20' : '85%', '19/20' : '95%' },
            Array(30).fill('').map((v, i) => i).reduce((a, i) => ({ ...a, [`${i + 1}`]: `${(i + 1) * 0.25}rem`}), {}),
            Array(200).fill('').map((v, i) => i).reduce((a, i) => ({ ...a, [`${i + 1}px`]: `${i + 1}px`}), {}),
            Array(33).fill('').map((v, i) => i).reduce((a, i) => ({ ...a, [`${200 + (i * 25)}px`]: `${200 + (i * 25)}px`}), {}),
        ),

        extend : {
            height    : (theme) => ({ ...theme('spacing') }),
            width     : (theme) => ({ ...theme('spacing') }),
            minWidth  : (theme) => ({ ...theme('spacing') }),
            minHeight : (theme) => ({ ...theme('spacing') }),
            maxWidth  : (theme, { breakpoints }) => ({ ...theme('spacing'), ...breakpoints(theme('screens')) }),
            zIndex    : { 'minus-1' : '-1', '1' : '1', '2' : '2', '3' : '3', '30' : '30', '40' : '40', '50' : '50', '100' : '100', '997' : '997', '998' : '998', '999' : '999', '1000' : '1000', '1001' : '1001', '1002' : '1002', '2000' : '2000' },
        },

        container : {
            center  : true,
            padding : { DEFAULT : '1.5rem', md : '1rem', lg : '2rem', xl : '2rem' },
            screens : { xl : '1200px' }
        },

        fontFamily : {
            system : ['ui-sans-serif', '-apple-system', 'BlinkMacSystemFont', '"Segoe UI"', 'Roboto', '"Helvetica Neue"', 'Arial', '"Noto Sans"', 'sans-serif', '"Apple Color Emoji"', '"Segoe UI Emoji"', '"Segoe UI Symbol"', '"Noto Color Emoji"'],
            sans   : ['proxima-nova', 'ui-sans-serif', '-apple-system', 'BlinkMacSystemFont', '"Segoe UI"', 'Roboto', '"Helvetica Neue"', 'Arial', '"Noto Sans"', 'sans-serif', '"Apple Color Emoji"', '"Segoe UI Emoji"', '"Segoe UI Symbol"', '"Noto Color Emoji"'],
            mono   : ['ui-monospace', 'SFMono-Regular', 'Menlo', 'Monaco', 'Consolas', '"Liberation Mono"', '"Courier New"', 'monospace'],
        },

        fontSize : Array(101).fill('').map((v, i) => i).reduce((a, i) => ({ ...a, [`${i}px`]: `${i}px`}), {}),
    }
}