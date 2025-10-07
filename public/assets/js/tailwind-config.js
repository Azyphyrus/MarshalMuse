tailwind.config = {
    theme: {
        extend: {
            colors: {
                'bg': 'var(--bg)',
                'card': 'var(--card)',
                'muted': 'var(--muted)',
                'accent-solid': 'var(--accent-solid)'
            },
            maxWidth: {
                'content': 'var(--maxwidth)'
            },
            borderRadius: {
                'custom': 'var(--radius)'
            }
        }
    }
}