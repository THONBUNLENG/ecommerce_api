import React from 'react';
import { createRoot } from 'react-dom/client';
import Storefront from './storefront/Storefront.jsx';

createRoot(document.getElementById('storefront-root')).render(
    <React.StrictMode>
        <Storefront />
    </React.StrictMode>,
);
