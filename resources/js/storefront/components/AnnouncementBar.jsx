import React, { useState } from 'react';
import { ChevronDown, Truck } from 'lucide-react';

export default function AnnouncementBar() {
    const [language, setLanguage] = useState('EN');

    return (
        <div className="bg-zinc-950 text-white">
            <div className="mx-auto flex min-h-9 max-w-[1600px] items-center justify-between gap-3 px-4 text-[10px] font-medium tracking-[0.12em] sm:px-8">
                <span className="hidden items-center gap-2 sm:flex"><Truck size={13} strokeWidth={1.7} /> FREE DELIVERY ON ORDERS OVER $50</span>
                <p className="flex-1 text-center sm:flex-none">MID-SEASON SALE · UP TO 50% OFF</p>
                <label className="flex cursor-pointer items-center gap-1.5">
                    <span className="sr-only">Choose language</span>
                    <select value={language} onChange={(event) => setLanguage(event.target.value)} className="cursor-pointer appearance-none border-0 bg-transparent py-1 pr-0 text-[10px] tracking-[0.12em] text-white focus:outline-none focus:ring-0">
                        <option value="KH" className="text-zinc-900">KH</option>
                        <option value="EN" className="text-zinc-900">EN</option>
                    </select>
                    <ChevronDown size={12} />
                </label>
            </div>
        </div>
    );
}
