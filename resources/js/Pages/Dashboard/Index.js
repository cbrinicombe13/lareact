import Admin from '@/Layouts/Admin';
import React from 'react';

export default function Dashboard(props) {
    return (
        <Admin
            auth={props.auth}
            errors={props.errors}
            heading="Dashboard">
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">You're logged in!</div>
                    </div>
                </div>
            </div>
        </Admin>
    );
}
