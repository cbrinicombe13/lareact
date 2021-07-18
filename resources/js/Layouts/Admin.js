import Authenticated from '@/Layouts/Authenticated';
import React from 'react';

export default function Dashboard(props) {
    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">{props.heading}</h2>}
        >
            {props.children}
        </Authenticated>
    );
}
